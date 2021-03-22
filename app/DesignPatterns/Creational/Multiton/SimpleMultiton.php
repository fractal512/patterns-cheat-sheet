<?php


namespace App\DesignPatterns\Creational\Multiton;


use App\DesignPatterns\Creational\Multiton\Interfaces\MultitonInterface;

class SimpleMultiton implements MultitonInterface
{
    use MultitonTrait;

    private $test;

    /**
     * @param mixed $test
     */
    public function setTest($test)
    {
        $this->test = $test;
        return $this;
    }
}
