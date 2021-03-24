<?php


namespace App\DesignPatterns\Structural\Facade\Classes;


use App\DesignPatterns\Traits\DispatchesLaravelLog;

class Order
{
    use DispatchesLaravelLog;

    public function save(){
        $this->logMessage('Order saved!');
    }
}
