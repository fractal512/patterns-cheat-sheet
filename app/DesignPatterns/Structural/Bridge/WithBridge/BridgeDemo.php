<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge;


use App\DesignPatterns\Structural\Bridge\Entities\Category;
use App\DesignPatterns\Structural\Bridge\Entities\Client;
use App\DesignPatterns\Structural\Bridge\Entities\Product;
use App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction\WidgetBigAbstraction;
use App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction\WidgetMiddleAbstraction;
use App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction\WidgetSmallAbstraction;
use App\DesignPatterns\Structural\Bridge\WithBridge\Realization\CategoryWidgetRealization;
use App\DesignPatterns\Structural\Bridge\WithBridge\Realization\ClientWidgetRealization;
use App\DesignPatterns\Structural\Bridge\WithBridge\Realization\ProductWidgetRealization;

class BridgeDemo
{
    public function run()
    {
        $productRealization = new ProductWidgetRealization(new Product());
        $categoryRealization = new CategoryWidgetRealization(new Category());
        $clientRealization = new ClientWidgetRealization(new Client());

        $views = [
            new WidgetBigAbstraction(),
            new WidgetMiddleAbstraction(),
            new WidgetSmallAbstraction(),
        ];

        foreach ($views as $view) {
            $view->run($productRealization);
            $view->run($categoryRealization);
            $view->run($clientRealization);
        }
    }
}
