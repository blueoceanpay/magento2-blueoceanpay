<?php

namespace BlueOcean\BlueOceanPay\Controller\Index;

class Notify extends \BlueOcean\BlueOceanPay\Controller\Index
{

    public function execute()
    {
        $id_log = $this->getUtilities()->generateIdLog();
        $this->getHelper()->log($id_log . " - " . "Notified blueoceanpay");

        $params_request = $this->getRequest()->getParams();
        $order_id = explode('-', $params_request['out_trade_no'])[1];
        if ($order_id) {
            $order = $this->getOrder($order_id);
            $transaction_amount = $order->getBaseGrandTotal() * 100;
            if ($params_request['total_fee'] != $transaction_amount) {
                $this->changeStatusOrder($order, 'canceled', 'canceled', $id_log);
            }
            try {
                $comment = 'BlueOceanPay: Pay Accept';
                $this->changeStatusOrder($order, 'pending', 'new', $id_log, $comment);
                //update order
                $this->changeStatusOrder($order, 'processing', 'processing', $id_log);
                //$this->addTransaction($order, $this->getUtilities()->getParameters());
                //$this->deactiveCart($order);
            } catch (\Exception $e) {
                $comment = 'BlueOceanPay: Exception message: ' . $e->getMessage();
            }

        } else {
            $order = $this->getOrder($order_id);
            $this->changeStatusOrder($order, 'canceled', 'canceled', $id_log);
        }
    }

    private function deactiveCart(\Magento\Sales\Model\Order $order)
    {
        $mantener_carrito = $this->getHelper()->getConfigData('mantener_carrito');
        if ($mantener_carrito) {
            $quote = $this->getQuoteFactory()->create()->load($order->getQuoteId());
            $quote->setIsActive(false);
            $quote->setReservedOrderId($order->getIncrementId());
            $quote->save();
        }
    }

    private function addTransaction(\Magento\Sales\Model\Order $order, $data_trans)
    {
        $transactions = $this->getTransSearch()->create()->addOrderIdFilter($order->getId());
        if (!empty($transactions)) {
            $this->getHelper()->log("Modificando transacción capture ...");
            /**
             * @var \Magento\Sales\Model\Order\Payment\Transaction $trans_item
             */
            foreach ($transactions->getItems() as $trans_item) {
                if ($trans_item->getTxnType() === \Magento\Sales\Model\Order\Payment\Transaction::TYPE_CAPTURE) {
                    $res = $data_trans;
                    $additional_info = $trans_item->getAdditionalInformation(\Magento\Sales\Model\Order\Payment\Transaction::RAW_DETAILS);
                    if (!empty($additional_info) && is_array($additional_info)) {
                        $res = array_merge($additional_info, $data_trans);
                    }
                    $trans_item->setAdditionalInformation(\Magento\Sales\Model\Order\Payment\Transaction::RAW_DETAILS, $res);
                    $trans_item->save();
                }
            }
        }
    }

    private function getOrder($order_id)
    {
        $order = $this->getOrderFactory()->create();
        return $order->loadByIncrementId($order_id);
    }

    private function changeStatusOrder($order, $status, $state, $id_log = 0, $comment = '')
    {
        $msg = "BlueOceanPay had update the order status and use the value: " . strtoupper($status);
        $this->getHelper()->log($id_log . " - " . $msg);
        $order->setStatus($status);
        $order->setState($state);
        $order->addStatusHistoryComment($msg, $status);
        if (!empty($comment)) {
            $order->addStatusHistoryComment($comment, $status);
        }
        if ($state === 'canceled') {
            $order->registerCancellation("");
        }
        $order->save();
    }
}
