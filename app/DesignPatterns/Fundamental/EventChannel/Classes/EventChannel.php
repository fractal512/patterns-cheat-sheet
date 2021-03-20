<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Classes;


use App\DesignPatterns\Fundamental\EventChannel\Interfaces\EventChannelInterface;
use App\DesignPatterns\Fundamental\EventChannel\Interfaces\SubscriberInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

/**
 * Class EventChannel
 * @package App\DesignPatterns\Fundamental\EventChannel\Classes
 */
class EventChannel implements EventChannelInterface
{
    use DispatchesLaravelLog;

    /**
     * @var array
     */
    private $topics = [];

    /**
     * @inheritDoc
     */
    public function publish($topic, $data)
    {
        if (empty($this->topics[$topic])) {
            return;
        }
        //$this->logMessage(print_r($this->topics, true));
        foreach ($this->topics[$topic] as $subscriber) {
            $subscriber->notify($data);
        }
    }

    /**
     * @inheritDoc
     */
    public function subscribe($topic, SubscriberInterface $subscriber)
    {
        $this->topics[$topic][] = $subscriber;

        $msg = "{$subscriber->getName()} subscribed on [{$topic}]";
        $this->logMessage($msg);
    }
}
