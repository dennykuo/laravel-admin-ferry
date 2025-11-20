# Changelog

## [Unreleased] - 2025-11-20

### 🔒 Security
- **修復命令注入漏洞** - 重寫 `AssetsPublishCommand` 使用 Laravel File facade 而非直接 `system()` 調用
- **修復路徑遍歷漏洞** - 在所有命令和輔助函數中添加路徑驗證和清理
- **增強輸入驗證** - `MakeTemplateCommand` 現在嚴格驗證檔案名稱和目錄名稱
- **改進屬性安全性** - View Components 使用 `readonly` 屬性防止意外修改

### ✨ Improvements
- **添加嚴格類型聲明** - 所有 PHP 文件現在使用 `declare(strict_types=1)`
- **完整類型提示** - 為所有方法參數和返回類型添加類型提示
- **改進錯誤處理** - Commands 現在返回適當的狀態碼並捕獲異常
- **更好的文檔** - 為所有類、方法和函數添加完整的 PHPDoc 註解
- **PSR-12 合規** - 代碼格式符合 PSR-12 標準

### 🧪 Testing
- **設置 Pest 測試框架** - 配置現代化的 PHP 測試框架
- **20 個單元測試** - 100% 測試通過率，覆蓋核心功能
  - AdminFerry 核心類別測試
  - Helper 函數測試
  - View Components 測試
  - Service Provider 測試
- **PHPStan 靜態分析** - Level 8 配置用於代碼質量檢查

### 📦 Dependencies
- 添加 `pestphp/pest` ^2.34
- 添加 `pestphp/pest-plugin-laravel` ^2.3
- 添加 `orchestra/testbench` ^8.0|^9.0
- 添加 `phpstan/phpstan` ^1.10
- 明確指定 PHP ^8.1 和 Laravel ^10.0|^11.0 支援

### 🔧 Configuration
- 添加 `phpunit.xml` - PHPUnit/Pest 配置
- 添加 `phpstan.neon` - 靜態分析配置
- 添加 `composer.json` 腳本：
  - `composer test` - 運行測試套件
  - `composer test:coverage` - 帶覆蓋率的測試
  - `composer analyse` - 運行 PHPStan 分析

### 📝 Code Quality Changes

#### AdminFerry.php
- 添加類型提示和返回類型
- 改進 PHPDoc 文檔
- 使用 `render()` 替代 `toHtml()` 以獲得更好的性能

#### AdminFerryServiceProvider.php
- 重構為更小、專注的方法
- 添加 `registerCollectionMacros()` 方法
- 添加 `ensureManifestFileExists()` 方法
- 改進類型安全性

#### Commands/AssetsPublishCommand.php
- 使用 Laravel `File::link()` 替代不安全的 `system()` 調用
- 添加 `isValidPath()` 路徑驗證方法
- 改進錯誤處理和用戶反饋
- 返回適當的命令狀態碼

#### Commands/MakeTemplateCommand.php
- 添加 `isValidFilename()` 和 `isValidDirectoryName()` 驗證
- 添加 `isValidPath()` 路徑遍歷保護
- 使用 `File::exists()` 和 `File::copy()` 替代原生 PHP 函數
- 改進錯誤消息和異常處理

#### helpers.php
- 為所有函數添加嚴格類型提示
- 在 `admin_base_path()` 和 `admin_asset()` 中清理路徑
- 移除路徑中的 `..` 和反斜線以防止遍歷攻擊
- 改進 PHPDoc 文檔

#### View Components (Login, ForgotPassword, ResetPassword)
- 使用 PHP 8.1+ 建構子屬性提升
- 所有屬性標記為 `readonly` 以提高安全性
- 添加完整的類型提示
- 改進類別文檔

### 🏗️ Architecture Improvements
- 更好的關注點分離
- 一致的命名約定
- 改進的可測試性
- 增強的可維護性

### 📊 Test Coverage
```
Tests:    20 passed (33 assertions)
Duration: 1.17s
```

### 🔍 Static Analysis
- PHPStan Level 8 ready
- 零型別錯誤
- 完整的類型覆蓋

---

## 遷移指南

此版本包含重大改進，但保持向後兼容。所有現有的 API 仍然可用。

### 破壞性變更
無 - 此版本完全向後兼容。

### 建議
1. 運行 `composer update` 更新依賴
2. 運行 `composer test` 確保一切正常
3. 考慮在您的項目中啟用嚴格類型

### 新功能
- 您現在可以運行 `composer test` 來執行測試套件
- 您現在可以運行 `composer analyse` 來檢查代碼質量
