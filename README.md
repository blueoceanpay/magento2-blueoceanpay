# Magento 2 BlueOcean Payments

Developer: BlueOcean
Website: http://www.blueoceanpay.com
Contact: <mailto:andy@blueoceanpay.com>

## Installation

### 1.Manual Installation

 * Download the extension
 * Unzip the file
 * Create a folder {Magento root}/app/code/BlueOcean/BlueOceanPay
 * Copy the content from the unzip folder

### 2.Using Composer

```
composer require blueoceanpay/magento2-blueoceanpay

```

## Enable extension

```
php bin/magento module:enable BlueOcean_BlueOceanPay
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento cache:flush
php bin/magento setup:static-content:deploy
```


## Extension main features
### For customers

    

 - Allow your customers to pay with Wechat App and scan QRCode.
 - Real time payment notification.
 -  Payment gateway will use the same language that the store.

### For store administrators

 - Configurable payment method name.
 - Fully configurable with a lot of options.


 
## Demo

### 後台

http://magento.rightyoo.net/admin/

user: admin

pass: 123456a

### 前台

http://magento.rightyoo.net/

user: demo@blueoceanpay.com

pass: 123456
