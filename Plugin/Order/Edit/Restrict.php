<?php

namespace Envalo\EditOrder\Plugin\Order\Edit;

use Magento\Framework\View\LayoutInterface;
use Magento\Sales\Block\Adminhtml\Order\View;
use Envalo\EditOrder\Helper\Data as HelperData;

class Restrict
{
    /**
     * @var HelperData
     */
    protected $_helperData;

    /**
     * Restrict constructor.
     *
     * @param HelperData $helperData
     */
    public function __construct(HelperData $helperData)
    {
        $this->_helperData = $helperData;
    }

    /**
     * @param View $object
     * @param LayoutInterface $layout
     *
     * @return array
     */
    public function beforeSetLayout(View $object, LayoutInterface $layout)
    {
        if (!$this->_helperData->isAllowedEdit()) {
            //$object->removeButton('order_cancel');
            $object->removeButton('order_edit');
        }

        return [$layout];
    }
}
