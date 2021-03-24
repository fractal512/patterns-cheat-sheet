<?php


namespace App\DesignPatterns\Structural\Facade;


use App\DesignPatterns\Structural\Facade\Classes\Order;
use App\DesignPatterns\Structural\Facade\Subsystem\OrderSaveDates;
use App\DesignPatterns\Structural\Facade\Subsystem\OrderSaveProducts;
use App\DesignPatterns\Structural\Facade\Subsystem\OrderSaveUsers;

class OrderSaveFacade
{
    public function save(Order $order, array $data)
    {
        (new OrderSaveProducts($order, $data))->run();

        (new OrderSaveDates($order, $data))->run();

        (new OrderSaveUsers($order, $data))->run();

        $order->save();

        return true;
    }
}
