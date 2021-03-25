<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction;


use App\DesignPatterns\Structural\Bridge\WithBridge\Realization\WidgetRealizationInterface;

class WidgetMiddleAbstraction extends WidgetAbstract
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
        $middleTitle = $this->getMiddleTitle();
        $description = $this->getRealization()->getDescription();

        return compact('id', 'middleTitle', 'description');
    }

    private function getMiddleTitle()
    {
        return $this->getRealization()->getId()
            . '->'
            . $this->getRealization()->getTitle();
    }
}
