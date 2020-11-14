<?php

namespace Envalo\EditOrder\Plugin\Order\Edit\Address;

use Envalo\EditOrder\Helper\Data as HelperData;

class Form
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

    public function afterGetFormValues(Magento\Sales\Block\Adminhtml\Order\Address\Form $subject, $form)
    {

        return $form;

    }


}
