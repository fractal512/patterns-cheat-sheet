<?php


namespace App\DesignPatterns\Creational\Multiton\Interfaces;


interface MultitonInterface
{
    public static function getInstance(string $instanceName): self;
}
