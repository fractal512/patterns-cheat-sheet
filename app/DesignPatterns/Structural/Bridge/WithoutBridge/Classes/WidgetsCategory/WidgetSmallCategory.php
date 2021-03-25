<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetsCategory;


use App\DesignPatterns\Structural\Bridge\Entities\Category;
use App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes\WidgetAbstract;
use Illuminate\Support\Str;

class WidgetSmallCategory extends WidgetAbstract
{
    public function run(Category $category)
    {
        $viewData = $this->getRealizationLogic($category);
        $this->viewLogic($viewData);
    }

    private function getRealizationLogic(Category $category)
    {
        $id = $category->id;
        $smallTitle = Str::limit($category->title, 5);
        $description = $category->description;

        return compact('id', 'smallTitle', 'description');
    }
}
