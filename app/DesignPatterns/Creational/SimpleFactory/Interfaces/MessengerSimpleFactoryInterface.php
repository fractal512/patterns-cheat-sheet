<?php


namespace App\DesignPatterns\Creational\SimpleFactory\Interfaces;


interface MessengerSimpleFactoryInterface
{
    public function build(string $type);
}
