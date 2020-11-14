<?php

namespace Envalo\EditOrder\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Sales\Model\Order;

class SalesOrderAfterSave implements ObserverInterface

{
    public function execute(Observer $observer)

    {
        $order = $observer->getEvent()->getOrder();
        if ($order instanceof \Magento\Framework\Model\AbstractModel) {
           if($order->getState() == 'processing') {

               $orderId = $order->getId();
               $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
               $order = $objectManager->create('\Magento\Sales\Model\Order') ->load($orderId);
               $orderState = Order::STATE_NEW;
               $order->setState($orderState)->setStatus(Order::STATE_NEW);
               $order->save();

           }

        }
        return $this;
    }
}
