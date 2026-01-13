# Laravel Admin Ferry - 測試指南

本套件包含完整的單元測試，確保代碼品質和穩定性。

## 安裝測試依賴

首先安裝測試相關的依賴：

```bash
composer install
```

測試依賴包括：
- PHPUnit (^9.5|^10.0) - 測試框架
- Orchestra Testbench (^7.0|^8.0) - Laravel 套件測試工具
- Mockery (^1.5) - Mock 物件工具

## 運行測試

### 運行所有測試

```bash
composer test
# 或
vendor/bin/phpunit
```

### 運行特定測試文件

```bash
vendor/bin/phpunit tests/Unit/AdminFerryTest.php
```

### 運行測試並生成覆蓋率報告

```bash
composer test-coverage
```

覆蓋率報告將生成在 `coverage/` 目錄中，可以在瀏覽器中打開 `coverage/index.html` 查看。

## 測試結構

```
tests/
├── TestCase.php                           # 基礎測試類
└── Unit/
    ├── AdminFerryTest.php                 # AdminFerry 核心類測試
    ├── HelpersTest.php                    # 輔助函數測試
    ├── CollectionMacroTest.php            # Collection macro 測試
    └── AdminFerryServiceProviderTest.php  # Service Provider 測試
```

## 測試覆蓋範圍

### AdminFerryTest
- ✅ 解析帶有 YAML front matter 的視圖
- ✅ AJAX 請求返回正確的包裝器
- ✅ 處理沒有 YAML front matter 的視圖
- ✅ 無效 YAML 拋出異常
- ✅ 清除緩存功能
- ✅ 遞迴轉換參數為 Collection

### HelpersTest
- ✅ adminView() 正確包裝視圖
- ✅ admin_base_path() 返回正確路徑
- ✅ admin_asset() 返回正確資源路徑
- ✅ admin_asset_mix() 返回版本化路徑
- ✅ 所有輔助函數都存在

### CollectionMacroTest
- ✅ recursive macro 已註冊
- ✅ 轉換嵌套陣列為 Collection
- ✅ 處理簡單陣列
- ✅ 轉換物件為 Collection
- ✅ 處理混合嵌套結構
- ✅ 保留純量值
- ✅ 處理空 Collection
- ✅ 處理深層嵌套結構

### AdminFerryServiceProviderTest
- ✅ 使用正確的命名空間載入視圖
- ✅ 註冊 Blade 組件命名空間
- ✅ 合併配置
- ✅ 註冊 Collection macro
- ✅ 設置資源路徑配置
- ✅ 使用緩存檢查 mix-manifest 文件

## 代碼優化說明

### 主要優化

1. **AdminFerry.php**
   - 添加完整的類型聲明
   - 添加異常處理和日誌記錄
   - 添加 clearCache() 方法
   - 改進文檔註釋

2. **AdminFerryServiceProvider.php**
   - 添加類型聲明
   - 使用緩存避免重複文件系統檢查
   - 僅在非生產環境檢查 manifest 文件
   - 將 Collection macro 提取為獨立方法
   - 改進代碼組織和可讀性

3. **CustomerController.php**
   - 添加完整的類型聲明
   - 添加錯誤處理
   - 實現 destroy() 方法
   - 實現 show() 方法
   - 添加日誌記錄
   - 改進文檔註釋

### 性能優化

- **緩存機制**：ServiceProvider 使用緩存避免每次請求都檢查文件系統
- **生產環境優化**：在生產環境跳過 manifest 檢查
- **錯誤處理**：添加完整的異常處理和日誌記錄，便於調試

### 代碼品質提升

- **類型安全**：所有方法都添加了參數和返回值類型聲明
- **文檔**：添加完整的 PHPDoc 註釋
- **測試覆蓋**：添加全面的單元測試
- **錯誤處理**：添加適當的異常處理
- **日誌記錄**：在關鍵點添加日誌記錄

## 持續集成

測試可以輕鬆集成到 CI/CD 流程中：

```yaml
# GitHub Actions 示例
- name: Run Tests
  run: composer test
```

## 貢獻指南

提交代碼前請確保：
1. 所有測試都通過
2. 新功能包含相應的測試
3. 代碼符合 PSR-12 標準
4. 測試覆蓋率保持在合理水平

## 問題回報

如果發現 bug 或有改進建議，請在 GitHub 上提交 issue。
