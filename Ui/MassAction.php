<?php
namespace Envalo\EditOrder\Ui;

use Envalo\EditOrder\Helper\Data as HelperData;

class MassAction extends \Magento\Ui\Component\MassAction
{

    /**
     * @var HelperData
     */
    protected $_helperData;

    private $authorization;
    public function __construct(
            \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
            \Magento\Framework\AuthorizationInterface $authorization,
            HelperData $helperData,
            array $components,
            array $data
    ) {
        $this->authorization = $authorization;
        $this->_helperData = $helperData;
        parent::__construct($context, $components, $data);
    }

    public function prepare() {
        parent::prepare();
        $config = $this->getConfiguration();
        if (!$this->_helperData->isAllowedEdit()) {
        $allowedActions = [];

        foreach ($config['actions'] as $action) {
            if ('pdfinvoices_order' == $action['type'] || 'pdfcreditmemos_order' == $action['type']) {
                $allowedActions[] = $action;
            }
        }
        $config['actions'] = $allowedActions;
    }
        $this->setData('config', (array)$config);
    }
}
