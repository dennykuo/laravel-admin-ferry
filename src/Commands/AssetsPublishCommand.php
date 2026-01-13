<?php

declare(strict_types=1);

namespace Dennykuo\AdminFerry\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Dennykuo\AdminFerry\Concerns\PackageSetting;

class AssetsPublishCommand extends Command
{
    use PackageSetting;

    protected $signature = 'laravel-admin-ferry:assets-publish';

    protected $description = 'Publish/update laravel-admin-ferry assets';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        try {
            $assetsLinkSrcPath = base_path(static::$assetsLinkSrcPath);
            $publishAssetsPath = public_path(static::$publishAssetsPath);

            // Validate paths to prevent directory traversal
            if (!$this->isValidPath($assetsLinkSrcPath) || !$this->isValidPath($publishAssetsPath)) {
                $this->error('Invalid path detected. Operation aborted for security reasons.');
                return Command::FAILURE;
            }

            // 創建目標目錄的上一層目錄 (ln 指令需要)
            $prependDir = dirname($publishAssetsPath);
            if (!File::isDirectory($prependDir)) {
                File::makeDirectory($prependDir, 0755, true);
            }

            // 先刪除目錄 link (防止舊目錄存在，導致路徑錯誤)
            if (is_link($publishAssetsPath)) {
                File::delete($publishAssetsPath);
            } elseif (File::isDirectory($publishAssetsPath)) {
                File::deleteDirectory($publishAssetsPath);
            }

            // 使用 Laravel 的 File facade 創建符號鏈接 (更安全)
            if (!File::link($assetsLinkSrcPath, $publishAssetsPath)) {
                $this->error('Failed to create symbolic link.');
                return Command::FAILURE;
            }

            $this->info('laravel-admin-ferry 的 assets 設定完成');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $this->error('Error publishing assets: ' . $e->getMessage());
            return Command::FAILURE;
        }
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

        // Ensure path is within base_path or public_path
        $realPath = realpath(dirname($path));
        $basePath = realpath(base_path());
        $publicPath = realpath(public_path());

        if ($realPath === false) {
            return true; // Path doesn't exist yet, allow creation
        }

        return str_starts_with($realPath, $basePath) || str_starts_with($realPath, $publicPath);
    }
}
