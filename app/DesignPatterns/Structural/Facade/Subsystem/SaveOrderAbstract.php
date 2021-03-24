<?php


namespace App\DesignPatterns\Structural\Facade\Subsystem;


use App\DesignPatterns\Structural\Facade\Classes\Order;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

abstract class SaveOrderAbstract
{
    use DispatchesLaravelLog;

    protected $order;

    protected $data;

    public function __construct(Order $order, array $data)
    {
        $this->order = $order;
        $this->data = $data;
    }

    public function run()
    {
        $this->logMessage(static::class);
    }
}
