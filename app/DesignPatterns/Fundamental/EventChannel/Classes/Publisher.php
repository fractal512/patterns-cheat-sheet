<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Classes;


use App\DesignPatterns\Fundamental\EventChannel\Interfaces\EventChannelInterface;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\PublisherInterface;

class Publisher implements PublisherInterface
{

    /**
     * @var string
     */
    private $topic;

    /**
     * @var EventChannelInterface
     */
    private $eventChannel;

    /**
     * Publisher constructor.
     * @param $topic
     * @param EventChannelInterface $eventChannel
     */
    public function __construct($topic, EventChannelInterface $eventChannel)
    {
        $this->topic = $topic;
        $this->eventChannel = $eventChannel;
    }

    /**
     * @inheritDoc
     */
    public function publish($data)
    {
        $this->eventChannel->publish($this->topic, $data);
    }
}
