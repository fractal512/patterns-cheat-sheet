<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsProduct;


use App\DesignPatterns\Structural\Bridge\Entities\Product;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetAbstract;

class WidgetMiddleProduct extends WidgetAbstract
{
    public function run(Product $product)
    {
        $viewData = $this->getRealizationLogic($product);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Product $product)
    {
        $id = $product->id;
        $middleTitle = $product->id . '->' . $product->name;
        $description = $product->description;

        return compact('id', 'middleTitle', 'description');
    }
}
