<?php


namespace App\DesignPatterns\Creational\AbstractFactory\Classes\Bootstrap;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\CheckBoxInterface;

class CheckBoxBootstrap implements CheckBoxInterface
{

    public function draw()
    {
        return __CLASS__;
    }
}
