<?php


namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;


use App\DesignPatterns\Structural\Decorator\Models\Order;

class OrderUpdateDecoratorNotifierUsers extends OrderUpdateDecoratorAbstract
{
    protected function actionBefore()
    {
        $this->logMessage('Notify users before');
    }

    protected function actionMain($order, $orderData): Order
    {
        $this->logMessage('Notify users immediately before calling run() action');
        return $this->decoratedObject->run($order, $orderData);
    }

    protected function actionAfter()
    {
        $this->logMessage('Notify users after');
    }
}
