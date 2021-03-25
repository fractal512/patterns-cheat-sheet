<?php


namespace App\DesignPatterns\Structural\Bridge\WithoutBridge\Classes;


use App\DesignPatterns\Traits\DispatchesLaravelLog;

class WidgetAbstract
{
    use DispatchesLaravelLog;

    protected function viewLogic($viewData)
    {
        $method = class_basename(static::class) . '::' . __FUNCTION__;
        $this->logMessage($method);
        $this->logMessage($viewData);
    }
}
