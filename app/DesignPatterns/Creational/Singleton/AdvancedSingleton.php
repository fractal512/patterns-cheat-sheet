<?php


namespace App\DesignPatterns\Creational\Singleton;


class AdvancedSingleton
{
    use SingletonTrait;

    private $test;

    /**
     * @param mixed $test
     */
    public function setTest($test): void
    {
        $this->test = $test;
    }
}
