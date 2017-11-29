<?php

namespace BlueOcean\BlueOceanPay\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Cancel extends \BlueOcean\BlueOceanPay\Controller\Index
{

    public function execute()
    {
        $this->getHelper()->log('Cancel');
        $result_redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $result_redirect->setUrl($this->getStoreManager()->getStore()->getBaseUrl() . 'checkout/cart');
        return $result_redirect;
    }
}
