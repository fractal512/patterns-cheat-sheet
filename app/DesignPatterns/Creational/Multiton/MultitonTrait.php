<?php


namespace App\DesignPatterns\Creational\Multiton;


use App\DesignPatterns\Creational\Multiton\Interfaces\MultitonInterface;

trait MultitonTrait
{
    protected static $instances = [];

    private $name;

    private function __construct()
    {
        //
    }

    private function __clone()
    {
        //
    }

    private function __wakeup()
    {
        //
    }

    /**
     * @param string $instanceName
     * @return MultitonInterface
     */
    public static function getInstance(string $instanceName): MultitonInterface
    {
        if (isset(static::$instances[$instanceName])) {
            return static::$instances[$instanceName];
        }

        static::$instances[$instanceName] = new static();
        static::$instances[$instanceName]->setName($instanceName);

        return static::$instances[$instanceName];
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}
