<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Classes;


use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterface;
use Illuminate\Support\Facades\Log;

class Subscriber implements SubscriberInterface
{

    /**
     * @var string
     */
    private $name;

    /**
     * Subscriber constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @inheritDoc
     */
    public function notify($data)
    {
        $msg = "{$this->getName()} informed by data [{$data}]";
        Log::info($msg);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }
}
