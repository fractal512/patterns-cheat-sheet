<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction;


use App\DesignPatterns\Structural\Bridge\WithBridge\Realization\WidgetRealizationInterface;
use Illuminate\Support\Str;

class WidgetSmallAbstraction extends WidgetAbstract
{
    public function run(WidgetRealizationInterface $realization)
    {
        $this->setRealization($realization);

        $viewData = $this->getViewData();
        $this->viewLogic($viewData);
    }

    public function getViewData()
    {
        $id = $this->getRealization()->getId();
        $smallTitle = $this->getSmallTitle();
        $description = $this->getRealization()->getDescription();

        return compact('id', 'smallTitle', 'description');
    }

    private function getSmallTitle()
    {
        return Str::limit($this->getRealization()->getTitle(), 5);
    }
}
