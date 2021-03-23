<?php


namespace App\DesignPatterns\Creational\ObjectPool;


use App\DesignPatterns\Creational\ObjectPool\Interfaces\ObjectPoolInterface;
use App\DesignPatterns\Creational\Singleton\SingletonTrait;

class ObjectPool
{
    use SingletonTrait;

    private $clones = [];

    private $prototypes = [];

    public function addObject(ObjectPoolInterface $obj)
    {
        $key = $this->getObjKey($obj);
        $this->prototypes[$key] = $obj;

        return $this;
    }

    public function getObjKey($obj)
    {
        if (is_object($obj)) {
            $key = get_class($obj);
        } elseif (is_string($obj)) {
            $key = $obj;
        } else {
            throw new \Exception("Can't determine class name!" );
        }
        return $key;
    }

    public function getObject(string $className)
    {
        $key = $this->getObjKey($className);

        if (isset($this->clones[$key])) {
            return false;
        }

        if (empty($this->prototypes[$key])) {
            return null;
        }

        $this->clones[$key] = clone $this->prototypes[$key];

        return $this->clones[$key];
    }

    public function release(ObjectPoolInterface &$obj)
    {
        $key = $this->getObjKey($obj);
        unset($this->clones[$key]);
        $obj = null;
    }
}
