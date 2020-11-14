<?php

namespace Envalo\EditOrder\Helper;

class Data
{
    protected $_context;

    public function __construct(
        \Magento\Framework\App\Action\Context $context
    ) {
        $this->_context = $context;
    }

    public function isAllowedEdit()
    {
        $auth          = $this->_context->getAuth();
        $loginUser     = $auth->getUser();
        $loginUserRole = $loginUser->getRole();

        if ($loginUserRole->getData('role_name') === 'Service Tech') {
            return false;
        } else {
            return true;
        }
    }
}
