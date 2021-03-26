<?php


namespace App\DesignPatterns\Structural\Composite\Orders\Traits;


use App\DesignPatterns\Structural\Composite\Orders\Interfaces\CompositeItemInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

trait CompositeTrait
{
    use DispatchesLaravelLog;

    private $compositeItems = [];

    public function setChildItem(CompositeItemInterface $item)
    {
        $this->compositeItems[] = $item;
    }

    public function calcPrice(): float
    {
        if ($this->price) return $this->price;

        $this->price = 0;

        foreach ($this->compositeItems as $compositeItem) {
            $this->price += $compositeItem->calcPrice();
        }

        $this->logMessage("[$this->id] {$this->type}::{$this->name} = {$this->price}");

        return $this->price;
    }
}
