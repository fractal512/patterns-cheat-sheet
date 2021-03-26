<?php


namespace App\DesignPatterns\Structural\Composite\Orders;


use App\DesignPatterns\Structural\Composite\Orders\Classes\ObjectsFactory;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

class OrderPriceComposite
{
    use DispatchesLaravelLog;

    private $factory;

    private $ingredientsCnt = 10;
    private $ingredients = [];

    private $productsCnt = 5;
    private $products = [];

    private $ordersCnt = 2;
    private $orders = [];

    public function __construct()
    {
        $this->factory = new ObjectsFactory();
    }

    public function run()
    {
        $this->initObjects();
        $this->calcPrices();
    }

    private function initObjects()
    {
        $this->ingredients = $this->factory->createIngredients($this->ingredientsCnt);
        $this->products = $this->factory->createProducts($this->ingredientsCnt, $this->ingredients);
        $this->orders = $this->factory->createOrders($this->ordersCnt, $this->products);
    }

    private function calcPrices()
    {
        $result = [];

        foreach ($this->orders as $order) {
            $result[] = [
                'order_id' => $order->id,
                'order_price' => $order->calcPrice(),
            ];
        }

        $this->logMessage($result)->logMessage($this->orders);
    }
}
