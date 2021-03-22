<?php


namespace App\DesignPatterns\Creational\Singleton;


use App\DesignPatterns\Creational\Singleton\Contracts\AnotherConnection;

class LaravelSingleton implements AnotherConnection
{
    private $test;

    public function setTest($val)
    {
        $this->test = $val;
    }
}
