<?php


namespace App\DesignPatterns\Creational\Prototype;


use Carbon\Carbon;

class Order
{
    public $id;

    public $deliveryDt;

    private $client;

    public function __construct(string $id, Carbon $deliveryDt, Client $client)
    {
        $this->id = $id;

        $this->deliveryDt = $deliveryDt;

        $this->client = $client;
    }

    public function __clone()
    {
        $this->id = $this->id . '_copy';
        $this->deliveryDt = $this->deliveryDt->copy();
        $this->client->addOrder($this);
    }
}
