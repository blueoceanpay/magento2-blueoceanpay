<?php

namespace BlueOcean\BlueOceanPay\Logger;

use Monolog;

class Handler extends \Magento\Framework\Logger\Handler\Base
{

    /**
     * Logging level
     *
     * @var int
     */
    protected $loggerType = Logger::INFO;

    /**
     * File name
     *
     * @var string
     */
    protected $fileName = '/var/log/blueoceanpay.log';
}
