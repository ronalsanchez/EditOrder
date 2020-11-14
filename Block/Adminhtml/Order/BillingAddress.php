<?php

namespace Envalo\EditOrder\Block\Adminhtml\Order;

use Magento\Sales\Api\Data\OrderAddressInterface;
use Envalo\EditOrder\Block\Adminhtml\Order\Create\Form\Address;
use Magento\Sales\Model\Order;

/**
 * Class BillingAddress
 * @package Mageplaza\EditOrder\Block\Adminhtml\Order\Edit
 */
class BillingAddress extends Address
{
    /**
     * @return Order
     */
    public function getCurrentOrder()
    {
        return $this->getOrder();
    }

    /**
     * @return array|OrderAddressInterface|null
     */
    public function getFormValues()
    {
        return $this->getCurrentOrder()->getBillingAddress();
    }

    /**
     * @return string
     */
    public function getBillingAddressEditUrl()
    {
        return $this->getUrl(
            'mpeditorder/address/form',
            [
                'type'     => 'billing',
                'order_id' => $this->getRequest()->getParam('order_id'),
                'form_key' => $this->getFormKey()
            ]
        );
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return 'billing_address';
    }

    /**
     * @return bool|int|null
     */
    public function getAddressId()
    {
        return $this->getCurrentOrder()->getBillingAddressId();
    }
}
