<?php


namespace App\DesignPatterns\Creational\Prototype;


class Client
{
    public $id;

    public $name;

    private $orders;

    public function __construct($id, $name)
    {
        $this->id = $id;

        $this->name = $name;
    }

    public function addOrder(Order $order): void
    {
        $this->orders[$order->id] = $order;
    }
}
