<?php


namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;


use App\DesignPatterns\Structural\Decorator\Models\Order;

class OrderUpdateDecoratorNotifierManagers extends OrderUpdateDecoratorAbstract
{
    protected function actionBefore()
    {
        $this->logMessage('Notify managers before');
    }

    protected function actionMain($order, $orderData): Order
    {
        $this->logMessage('Notify managers immediately before calling run() action');
        return $this->decoratedObject->run($order, $orderData);
    }

    protected function actionAfter()
    {
        $this->logMessage('Notify managers after');
    }
}
