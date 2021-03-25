<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsProduct;


use App\DesignPatterns\Structural\Bridge\Entities\Product;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetAbstract;
use Illuminate\Support\Str;

class WidgetSmallProduct extends WidgetAbstract
{
    public function run(Product $product)
    {
        $viewData = $this->getRealizationLogic($product);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Product $product)
    {
        $id = $product->id;
        $smallTitle = Str::limit($product->name, 7);
        $description = $product->description;

        return compact('id', 'smallTitle', 'description');
    }
}
