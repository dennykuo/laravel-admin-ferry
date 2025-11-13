# 更新日誌

所有重要的項目變更都將記錄在此文件中。

格式基於 [Keep a Changelog](https://keepachangelog.com/zh-TW/1.0.0/)，
並且本項目遵循 [語義化版本](https://semver.org/lang/zh-TW/)。

## [未發布]

### 新增
- 完整的測試框架和單元測試
- PHPUnit 配置和測試用例
- 完善的 README 文檔，包含詳細使用說明
- .editorconfig 配置文件以統一代碼風格
- .gitattributes 配置文件
- CHANGELOG.md 更新日誌

### 改進
- **安全性**: 修復 `AssetsPublishCommand` 使用 `system()` 的安全問題，改用 Laravel `File::link()`
- **跨平台**: 改善 Windows 兼容性，提供更好的錯誤提示
- **類型安全**: 為所有 PHP 類添加類型聲明和返回類型
- **錯誤處理**: 添加完善的異常處理和日誌記錄
- **性能**: 優化 ServiceProvider，避免每次請求都檢查 mix-manifest.json
- **代碼品質**: 改善文檔註釋和代碼可讀性

### 修復
- 修復 `admin_asset()` 沒有處理空配置的問題
- 修復 Collection macro 可能重複註冊的問題
- 改善錯誤訊息和用戶提示

### 更新
- composer.json 添加完整的元數據（license、authors、keywords）
- 添加開發依賴（PHPUnit、Orchestra Testbench、Mockery）
- 指定 PHP 版本要求（^8.0）
- 指定 Laravel 版本兼容性（8.x - 11.x）

## [1.0.0] - 初始發布

### 新增
- 基於 Tailwind CSS 2.0 的響應式後台管理介面
- YAML Front Matter 支持
- Vue.js 2.x 整合
- HTMX 動態載入支持
- 豐富的 Blade 組件庫
- Eva Icons 圖示系統
- 繁體中文語言包
- 完整的 Boilerplate 範例應用程式
