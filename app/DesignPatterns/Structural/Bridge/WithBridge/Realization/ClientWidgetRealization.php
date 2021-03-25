<?php


namespace App\DesignPatterns\Structural\Bridge\WithBridge\Realization;


use App\DesignPatterns\Structural\Bridge\Entities\Client;

class ClientWidgetRealization implements WidgetRealizationInterface
{
    private $entity;

    public function __construct(Client $client)
    {
        $this->entity = $client;
    }

    public function getId()
    {
        return $this->entity->id;
    }

    public function getTitle()
    {
        return $this->entity->name;
    }

    public function getDescription()
    {
        return $this->entity->bio;
    }
}
