<?php

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
        $assetsLinkSrcPath = base_path(static::$assetsLinkSrcPath);
        $publishAssetsPath = public_path(static::$publishAssetsPath);

        // 驗證來源目錄是否存在
        if (! File::isDirectory($assetsLinkSrcPath)) {
            $this->error("來源目錄不存在: {$assetsLinkSrcPath}");
            return self::FAILURE;
        }

        // 創建目標目錄的上一層目錄
        $prependDir = \Str::beforeLast($publishAssetsPath, DIRECTORY_SEPARATOR);

        if (! File::isDirectory($prependDir)) {
            try {
                File::makeDirectory($prependDir, 0755, true);
            } catch (\Exception $e) {
                $this->error("無法創建目錄: {$prependDir}");
                $this->error($e->getMessage());
                return self::FAILURE;
            }
        }

        // 先刪除舊的 symlink 或目錄
        if (File::exists($publishAssetsPath)) {
            if (is_link($publishAssetsPath)) {
                File::delete($publishAssetsPath);
            } else {
                $this->warn("目標路徑已存在且不是符號連結，將被刪除: {$publishAssetsPath}");
                File::deleteDirectory($publishAssetsPath);
            }
        }

        // 創建符號連結（跨平台兼容）
        try {
            // Windows 使用 junction 或 symlink，Unix/Linux 使用 symlink
            if (! File::link($assetsLinkSrcPath, $publishAssetsPath)) {
                throw new \RuntimeException('無法創建符號連結');
            }

            $this->info('✓ laravel-admin-ferry 的 assets 設定完成');
            $this->line("  來源: {$assetsLinkSrcPath}");
            $this->line("  目標: {$publishAssetsPath}");

            return self::SUCCESS;
        } catch (\Exception $e) {
            $this->error('創建符號連結失敗');
            $this->error($e->getMessage());
            $this->line('');
            $this->warn('如果您在 Windows 上遇到權限問題，請以管理員權限運行命令提示字元');

            return self::FAILURE;
        }
    }
}
