<?php


namespace App\DesignPatterns\Creational\StaticFactory\Interfaces;


interface MessengerStaticFactoryInterface
{
    public static function build(string $type);
}
