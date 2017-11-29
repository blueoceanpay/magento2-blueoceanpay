# Magento 2 BlueOcean Payments

Developer: BlueOcean
Website: http://www.blueoceanpay.com
Contact: <mailto:andy@blueoceanpay.com>


## Installation Disable Newsletter

### Manual Installation

 * Download the extension
 * Unzip the file
 * Create a folder {Magento root}/app/code/BlueOcean/BlueOceanPay
 * Copy the content from the unzip folder

### Using Composer

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
 - Allow to use test and production enviroments.
 - Detailed debug mode for integration and issue resolution.
 - Fully configurable with a lot of options.

### BlueOceanPay's payment gateway main features

 - Simplicity, since no software installation in the merchant is required.

 
