<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Classes;


use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

class Subscriber implements SubscriberInterface
{
    use DispatchesLaravelLog;

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
        $this->logMessage($msg);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }
}
