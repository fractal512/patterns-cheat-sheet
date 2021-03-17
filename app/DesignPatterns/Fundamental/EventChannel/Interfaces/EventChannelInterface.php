<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;


/**
 * Interface EventChannelInterface
 * @package App\DesignPatterns\Fundamental\EventChannel\Interfaces
 */
interface EventChannelInterface
{
    /**
     * @param $topic
     * @param $data
     * @return mixed
     */
    public function publish($topic, $data);

    /**
     * @param $topic
     * @param SubscriberInterface $subscriber
     * @return mixed
     */
    public function subscribe($topic, SubscriberInterface $subscriber);
}
