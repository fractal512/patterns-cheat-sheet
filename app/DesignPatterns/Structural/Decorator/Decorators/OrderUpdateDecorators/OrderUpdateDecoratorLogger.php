<?php


namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;


use App\DesignPatterns\Structural\Decorator\Models\Order;

class OrderUpdateDecoratorLogger extends OrderUpdateDecoratorAbstract
{
    protected function actionBefore()
    {
        $this->logMessage('Log Before');
    }

    protected function actionMain($order, $orderData): Order
    {
        $this->logMessage('Log immediately before calling run() action');
        return $this->decoratedObject->run($order, $orderData);
    }

    protected function actionAfter()
    {
        $this->logMessage('Log After');
    }
}
