# Magento 2 BlueOcean Payments

Developer: BlueOcean
Website: http://www.blueoceanpay.com
Contact: <mailto:andy@blueoceanpay.com>

## 安裝
### 1.手動安裝

 * 下載擴展程序
 * 解壓下載的壓縮包
 * 在 Magento 安裝根目錄創建相應文件夾 {Magento root}/app/code/BlueOcean/BlueOceanPay
 * 複製解壓後的所有內容到新建文件夾

### 2.使用 Composer 安裝

```
composer require blueoceanpay/magento2-blueoceanpay
```

## 啓用擴展

```
php bin/magento module:enable BlueOcean_BlueOceanPay
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
php bin/magento setup:static-content:deploy
```


## 擴展主要功能
### 用戶端

 - 使用戶可通過微信掃描支付二維碼，完成訂單支付.
 - 實時支付結果通知.
 - 多語言支持.

### 商戶後台

 - 可配置支付方法名稱.
 - 可配置的其它多種選項.


## Demo

### 後台

http://magento.rightyoo.net/admin/

user: admin

pass: 123456a

### 前台

http://magento.rightyoo.net/

user: demo@blueoceanpay.com

pass: 123456

 
