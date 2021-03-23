<?php


namespace App\DesignPatterns\Creational\ObjectPool\Objects;


use App\DesignPatterns\Creational\ObjectPool\Interfaces\ObjectPoolInterface;

class CreditCard implements ObjectPoolInterface
{
    public $cardId;

    public $cardHolder;

    public $cardCVV;

    public function __clone()
    {
        $this->cardId = null;

        $this->cardHolder = null;

        $this->cardCVV = null;
    }
}
