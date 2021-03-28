<?php


namespace App\DesignPatterns\Structural\Decorator\Classes;


use App\DesignPatterns\Structural\Decorator\Interfaces\OrderUpdateInterface;
use App\DesignPatterns\Structural\Decorator\Models\Order;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

final class OrderUpdate implements OrderUpdateInterface
{

    use DispatchesLaravelLog;

    public function run(Order $order, array $orderData): Order
    {
        $this->logMessage('Base update');

        return $order;
    }
}
