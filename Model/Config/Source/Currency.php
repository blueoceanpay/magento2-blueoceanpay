<?php

namespace BlueOcean\BlueOceanPay\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Currency implements OptionSourceInterface
{

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [];
        $options[] = [
            'label' => __('HK DOLAR'),
            'value' => 'HKD',
        ];
        $options[] = [
            'label' => __('DOLAR'),
            'value' => 'DOL',
        ];
        return $options;
    }
}
