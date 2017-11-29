<?php

namespace BlueOcean\BlueOceanPay\Controller\Index;


class Check extends \BlueOcean\BlueOceanPay\Controller\Index
{

    public function execute()
    {
        $request = $this->getRequest()->getParams();
        if ($this->getOrderStatus($request['order_id']) == 'pending') {
            echo true;
        } else {
            echo false;
        }
    }

    public function getOrderStatus($orderId)
    {
        $order = $this->getOrderFactory()->create();
        $order->loadByIncrementId($orderId);
        $state = $order->getState(); //Get Order State(Complete, Processing, ....)
        return $state;
    }
}
