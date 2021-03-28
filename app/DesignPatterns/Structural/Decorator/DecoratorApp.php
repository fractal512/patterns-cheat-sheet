<?php


namespace App\DesignPatterns\Structural\Decorator;


use App\DesignPatterns\Structural\Decorator\Classes\OrderUpdate;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Models\Order;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;

class DecoratorApp
{
    public function run()
    {
        $order = new Order();
        $orderData = [];
        $updateOrderObj = $this->getUpdateOrderObj();

        $updateOrderObj->run($order, $orderData);
    }

    private function getUpdateOrderObj(): OrderUpdateInterface
    {
        //return new OrderUpdateDecoratorLogger(new OrderUpdate());

        $orderUpdateLogger = new OrderUpdateDecoratorLogger(new OrderUpdate());
        $orderUpdateNotifierManagers = new OrderUpdateDecoratorNotifierManagers($orderUpdateLogger);
        return new OrderUpdateDecoratorNotifierUsers($orderUpdateNotifierManagers);
    }
}
