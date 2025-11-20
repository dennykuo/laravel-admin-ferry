<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Dennykuo\AdminFerry\Concerns\PackageSetting;

class MakeTemplateCommand extends Command
{
    use PackageSetting;

    protected $signature = 'laravel-admin-ferry:make-template';

    protected $description = 'Make laravel-admin-ferry template file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            // template 名稱
            $view = $this->choice(
                '想要哪一個 template',
                static::$templateList
            );

            // 產出位置 (resources/views/{$outputDir})
            $outputDir = $this->anticipate(
                '產出的 view dir 位置 (於 resources/views/ 下)',
                ['', 'admin']
            );

            // Validate output directory
            if (!$this->isValidDirectoryName($outputDir)) {
                $this->error('無效的目錄名稱。請避免使用特殊字符。');
                return Command::FAILURE;
            }

            // 產出檔案名 (不需 blade.php 副檔名)
            $outputViewName = $this->ask(
                '產出的檔案名 (不需 blade.php 副檔名)'
            );

            // Validate filename
            if (!$this->isValidFilename($outputViewName)) {
                $this->error('無效的檔案名稱。請使用字母、數字、連字符和底線。');
                return Command::FAILURE;
            }

            $templateSourcePath = base_path(static::$templateSourcePath);
            $templateOutputPath = base_path(static::$templateOutputPath);

            if ($outputDir !== '' && $outputDir !== null) {
                $templateOutputPath .= '/' . $outputDir;
            }

            $templateSourceFile = "{$templateSourcePath}/{$view}.blade.php";
            $templateOutputFile = "{$templateOutputPath}/{$outputViewName}.blade.php";

            // Validate paths to prevent directory traversal
            if (!$this->isValidPath($templateOutputFile)) {
                $this->error('偵測到無效路徑。基於安全考量已終止操作。');
                return Command::FAILURE;
            }

            // 檢查來源檔案是否存在
            if (!File::exists($templateSourceFile)) {
                $this->error('模板來源檔案不存在。');
                return Command::FAILURE;
            }

            // 如果已經有同名檔案，終止
            if (File::exists($templateOutputFile)) {
                $this->error('該位置已有此檔案，請重新設定。');
                return Command::FAILURE;
            }

            // 若沒有資料夾，新增資料夾
            if (!File::isDirectory($templateOutputPath)) {
                File::makeDirectory($templateOutputPath, 0755, true);
            }

            // 複製檔案
            File::copy($templateSourceFile, $templateOutputFile);

            $this->info('laravel-admin-ferry template 產出完成');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error creating template: ' . $e->getMessage());
            return Command::FAILURE;
        }
    }

    /**
     * Validate filename to prevent injection attacks.
     *
     * @param string|null $filename
     * @return bool
     */
    private function isValidFilename(?string $filename): bool
    {
        if ($filename === null || $filename === '') {
            return false;
        }

        // Only allow alphanumeric, hyphens, underscores, and dots
        return preg_match('/^[a-zA-Z0-9_\-\.]+$/', $filename) === 1;
    }

    /**
     * Validate directory name to prevent injection attacks.
     *
     * @param string|null $dirname
     * @return bool
     */
    private function isValidDirectoryName(?string $dirname): bool
    {
        if ($dirname === null || $dirname === '') {
            return true; // Empty is valid (root)
        }

        // Only allow alphanumeric, hyphens, underscores, and forward slashes
        return preg_match('/^[a-zA-Z0-9_\-\/]+$/', $dirname) === 1
            && !str_contains($dirname, '..');
    }

    /**
     * Validate path to prevent directory traversal attacks.
     *
     * @param string $path
     * @return bool
     */
    private function isValidPath(string $path): bool
    {
        // Check for directory traversal patterns
        if (str_contains($path, '..')) {
            return false;
        }

        // Ensure path is within base_path
        $realPath = realpath(dirname($path));
        $basePath = realpath(base_path());

        if ($realPath === false) {
            // Directory doesn't exist yet, check parent
            return $this->isValidPath(dirname($path));
        }

        return str_starts_with($realPath, $basePath);
    }
}
