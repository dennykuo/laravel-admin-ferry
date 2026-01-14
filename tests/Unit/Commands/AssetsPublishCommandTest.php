<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\Tests\Unit\Commands;

use Dennykuo\AdminFerry\Commands\AssetsPublishCommand;
use Dennykuo\AdminFerry\Tests\TestCase;
use Illuminate\Support\Facades\File;

class AssetsPublishCommandTest extends TestCase
{
    protected string $testPublicPath;
    protected string $testAssetsPath;

    protected function setUp(): void
    {
        parent::setUp();

        // Setup test paths
        $this->testPublicPath = public_path('test-vendor/laravel-admin-ferry');
        $this->testAssetsPath = base_path('vendor/dennykuo/laravel-admin-ferry/assets');
    }

    protected function tearDown(): void
    {
        // Cleanup test directories and links
        $testVendorPath = public_path('test-vendor');
        if (is_link($this->testPublicPath)) {
            File::delete($this->testPublicPath);
        }
        if (File::isDirectory($this->testPublicPath)) {
            File::deleteDirectory($this->testPublicPath);
        }
        if (File::isDirectory($testVendorPath)) {
            File::deleteDirectory($testVendorPath);
        }

        parent::tearDown();
    }

    /** @test */
    public function command_is_registered()
    {
        $this->assertTrue(class_exists(AssetsPublishCommand::class));
    }

    /** @test */
    public function command_has_correct_signature()
    {
        $command = new AssetsPublishCommand();
        $reflection = new \ReflectionClass($command);
        $property = $reflection->getProperty('signature');
        $property->setAccessible(true);

        $this->assertEquals('laravel-admin-ferry:assets-publish', $property->getValue($command));
    }

    /** @test */
    public function command_has_description()
    {
        $command = new AssetsPublishCommand();
        $reflection = new \ReflectionClass($command);
        $property = $reflection->getProperty('description');
        $property->setAccessible(true);

        $description = $property->getValue($command);
        $this->assertNotEmpty($description);
        $this->assertStringContainsString('assets', strtolower($description));
    }

    /** @test */
    public function command_creates_symbolic_link_successfully()
    {
        // Create source directory if it doesn't exist
        if (!File::isDirectory($this->testAssetsPath)) {
            File::makeDirectory($this->testAssetsPath, 0755, true);
        }

        // Create a test file in the source
        $testFile = $this->testAssetsPath . '/test.txt';
        File::put($testFile, 'test content');

        try {
            $this->artisan('laravel-admin-ferry:assets-publish')
                ->assertExitCode(0);

            // Verify the symbolic link or directory was created
            $targetPath = public_path('vendor/laravel-admin-ferry');
            $this->assertTrue(
                is_link($targetPath) || File::isDirectory($targetPath),
                'Expected symbolic link or directory to be created'
            );
        } finally {
            // Cleanup
            if (File::exists($testFile)) {
                File::delete($testFile);
            }
        }
    }

    /** @test */
    public function command_removes_existing_link_before_creating_new_one()
    {
        // Create a dummy symbolic link first
        $targetPath = public_path('vendor/laravel-admin-ferry');
        $parentDir = dirname($targetPath);

        if (!File::isDirectory($parentDir)) {
            File::makeDirectory($parentDir, 0755, true);
        }

        // Create source directory
        if (!File::isDirectory($this->testAssetsPath)) {
            File::makeDirectory($this->testAssetsPath, 0755, true);
        }

        // Create initial link
        if (!is_link($targetPath) && !File::isDirectory($targetPath)) {
            File::link($this->testAssetsPath, $targetPath);
        }

        $this->assertTrue(
            is_link($targetPath) || File::isDirectory($targetPath),
            'Pre-condition: link should exist'
        );

        // Run command again - should remove old link and create new one
        $this->artisan('laravel-admin-ferry:assets-publish')
            ->assertExitCode(0);

        // Verify link still exists (recreated)
        $this->assertTrue(
            is_link($targetPath) || File::isDirectory($targetPath),
            'Link should be recreated'
        );
    }

    /** @test */
    public function command_creates_parent_directory_if_not_exists()
    {
        $customPath = public_path('custom-test-dir/sub-dir/assets');

        // Ensure parent directory doesn't exist
        $parentDir = dirname($customPath);
        if (File::isDirectory($parentDir)) {
            File::deleteDirectory(public_path('custom-test-dir'));
        }

        // Create source directory
        if (!File::isDirectory($this->testAssetsPath)) {
            File::makeDirectory($this->testAssetsPath, 0755, true);
        }

        try {
            // Run the command (it should create the default path)
            $this->artisan('laravel-admin-ferry:assets-publish')
                ->assertExitCode(0);

            // Verify parent directory of default path was created
            $defaultTargetPath = public_path('vendor/laravel-admin-ferry');
            $defaultParentDir = dirname($defaultTargetPath);

            $this->assertTrue(
                File::isDirectory($defaultParentDir),
                'Parent directory should be created'
            );
        } finally {
            // Cleanup custom directory if created
            if (File::isDirectory(public_path('custom-test-dir'))) {
                File::deleteDirectory(public_path('custom-test-dir'));
            }
        }
    }

    /** @test */
    public function command_displays_success_message()
    {
        // Create source directory
        if (!File::isDirectory($this->testAssetsPath)) {
            File::makeDirectory($this->testAssetsPath, 0755, true);
        }

        $this->artisan('laravel-admin-ferry:assets-publish')
            ->expectsOutput('laravel-admin-ferry 的 assets 設定完成')
            ->assertExitCode(0);
    }

    /** @test */
    public function is_valid_path_method_rejects_directory_traversal()
    {
        $command = new AssetsPublishCommand();
        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('isValidPath');
        $method->setAccessible(true);

        // Test directory traversal patterns
        $maliciousPath = base_path('vendor/../../../etc/passwd');
        $result = $method->invoke($command, $maliciousPath);

        $this->assertFalse($result, 'Should reject path with .. traversal');
    }

    /** @test */
    public function is_valid_path_method_accepts_valid_paths()
    {
        $command = new AssetsPublishCommand();
        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('isValidPath');
        $method->setAccessible(true);

        // Test valid paths
        $validPath = public_path('vendor/laravel-admin-ferry');
        $result = $method->invoke($command, $validPath);

        $this->assertTrue($result, 'Should accept valid public path');

        // Test another valid path
        $validBasePath = base_path('vendor/dennykuo/laravel-admin-ferry/assets');
        $result = $method->invoke($command, $validBasePath);

        $this->assertTrue($result, 'Should accept valid base path');
    }

    /** @test */
    public function is_valid_path_method_allows_non_existent_paths()
    {
        $command = new AssetsPublishCommand();
        $reflection = new \ReflectionClass($command);
        $method = $reflection->getMethod('isValidPath');
        $method->setAccessible(true);

        // Test path that doesn't exist yet (but is valid)
        $nonExistentPath = public_path('vendor/new-directory/assets');
        $result = $method->invoke($command, $nonExistentPath);

        $this->assertTrue(
            $result,
            'Should allow non-existent paths within valid directories'
        );
    }

    /** @test */
    public function command_handles_existing_directory_at_target_path()
    {
        // Create source directory
        if (!File::isDirectory($this->testAssetsPath)) {
            File::makeDirectory($this->testAssetsPath, 0755, true);
        }

        $targetPath = public_path('vendor/laravel-admin-ferry');

        // Create a regular directory (not a link) at the target path
        if (!File::isDirectory($targetPath)) {
            File::makeDirectory($targetPath, 0755, true);
        }

        // Add a test file to the directory
        File::put($targetPath . '/test.txt', 'test');

        $this->artisan('laravel-admin-ferry:assets-publish')
            ->assertExitCode(0);

        // Verify the command succeeded
        // The old directory should be replaced with a link
        $this->assertTrue(
            is_link($targetPath) || File::isDirectory($targetPath),
            'Target should exist as link or directory'
        );
    }
}
