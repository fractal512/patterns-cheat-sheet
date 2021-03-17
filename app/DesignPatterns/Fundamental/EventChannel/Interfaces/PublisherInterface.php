<?php


namespace App\DesignPatterns\Fundamental\EventChannel\Interfaces;


/**
 * Interface PublisherInterface
 * @package App\DesignPatterns\Fundamental\EventChannel\Interfaces
 */
interface PublisherInterface
{
    /**
     * @param $data
     * @return mixed
     */
    public function publish($data);
}
