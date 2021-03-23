<?php


namespace App\DesignPatterns\Creational\ObjectPool\Objects;


use App\DesignPatterns\Creational\ObjectPool\Interfaces\ObjectPoolInterface;

class User implements ObjectPoolInterface
{
    public $name;

    public function __clone()
    {
        $this->name = null;
    }
}
