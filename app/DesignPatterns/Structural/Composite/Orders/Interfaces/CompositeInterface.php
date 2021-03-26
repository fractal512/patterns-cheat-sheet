<?php


namespace App\DesignPatterns\Structural\Composite\Orders\Interfaces;


interface CompositeInterface extends CompositeItemInterface
{
    public function setChildItem(CompositeItemInterface $item);
}
