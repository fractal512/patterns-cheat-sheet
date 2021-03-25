<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge;


use App\DesignPatterns\Structural\Bridge\Entities\Category;
use App\DesignPatterns\Structural\Bridge\Entities\Product;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsCategory\WidgetBigCategory;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsCategory\WidgetMiddleCategory;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsCategory\WidgetSmallCategory;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsProduct\WidgetBigProduct;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsProduct\WidgetMiddleProduct;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsProduct\WidgetSmallProduct;

class WithoutBridgeDemo
{
    public function run()
    {
        $product = new Product();
        (new WidgetBigProduct())->run($product);
        (new WidgetMiddleProduct())->run($product);
        (new WidgetSmallProduct())->run($product);

        $category = new Category();
        (new WidgetBigCategory())->run($category);
        (new WidgetMiddleCategory())->run($category);
        (new WidgetSmallCategory())->run($category);
    }
}
