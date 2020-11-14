<?php

namespace Envalo\EditOrder\Block\Adminhtml\Order;

use Magento\Sales\Api\Data\OrderAddressInterface;
use Envalo\EditOrder\Block\Adminhtml\Order\Create\Form\Address;
use Magento\Sales\Model\Order;
use Mageplaza\EditOrder\Block\Adminhtml\Order\EditOrder;

/**
 * Class ShippingAddress
 * @package Mageplaza\EditOrder\Block\Adminhtml\Order\Edit
 */
class ShippingAddress extends Address
{
    /**
     * @return mixed
     */
    public function getHelperData()
    {
        /** @var EditOrder $parentBlock */
        $parentBlock = $this->getParentBlock();

        return $parentBlock->getHelperData();
    }

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
        return $this->getCurrentOrder()->getShippingAddress();
    }

    /**
     * @return string
     */
    public function getShippingAddressEditUrl()
    {
        return $this->getUrl(
            'mpeditorder/address/form',
            [
                'type'     => 'shipping',
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
        return 'shipping_address';
    }

    /**
     * @return bool|int|mixed
     */
    public function getAddressId()
    {
        return $this->getCurrentOrder()->getShippingAddress() ?
            $this->getCurrentOrder()->getShippingAddress()->getId() : 0;
    }
}
