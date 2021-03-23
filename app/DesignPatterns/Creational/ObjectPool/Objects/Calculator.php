<?php


namespace App\DesignPatterns\Creational\ObjectPool\Objects;


use App\DesignPatterns\Creational\ObjectPool\Interfaces\ObjectPoolInterface;

class Calculator implements ObjectPoolInterface
{
    public $memory;

    public function __clone()
    {
        $this->memory = null;
    }
}
