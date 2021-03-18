<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Classes\Bootstrap;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\ButtonInterface;

class ButtonBootstrap implements ButtonInterface
{

    public function draw()
    {
        return __CLASS__;
    }
}
