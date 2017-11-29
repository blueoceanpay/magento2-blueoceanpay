<?php

namespace BlueOcean\BlueOceanPay\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Success extends \BlueOcean\BlueOceanPay\Controller\Index
{

    public function execute()
    {
        $session = $this->getCheckoutSession();
        $order_id = $session->getLastRealOrderId();
        $order = $this->getOrderFactory()->create();
        $order->loadByIncrementId($order_id);
        $session->setQuoteId($order->getQuoteId());
        $session->getQuote()->setIsActive(false)->save();
        $result_redirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $result_redirect->setUrl($this->getStoreManager()->getStore()->getBaseUrl() . 'checkout/onepage/success');
        return $result_redirect;
    }
}
