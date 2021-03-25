<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Abstraction;


use App\DesignPatterns\Structural\Bridge\WithBridge\Realization\WidgetRealizationInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

class WidgetAbstract
{
    use DispatchesLaravelLog;

    protected $realization;

    public function setRealization(WidgetRealizationInterface $realization)
    {
        $this->realization = $realization;
    }

    /**
     * @return WidgetRealizationInterface
     */
    public function getRealization()
    {
        return $this->realization;
    }

    protected function viewLogic($viewData)
    {
        $method = class_basename(static::class) . '::' . __FUNCTION__;
        $this->logMessage($method);
        $this->logMessage($viewData);
    }
}
