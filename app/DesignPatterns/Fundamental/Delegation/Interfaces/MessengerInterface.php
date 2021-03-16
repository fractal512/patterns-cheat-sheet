<?php


namespace App\DesignPatterns\Fundamental\Delegation\Interfaces;


/**
 * Interface MessengerInterface
 * @package App\DesignPatterns\Fundamental\Delegation\Interfaces
 */
interface MessengerInterface
{
    /**
     * @param string $value
     * @return mixed
     */
    public function setSender(string $value): MessengerInterface;

    /**
     * @param string $value
     * @return mixed
     */
    public function setRecipient(string $value): MessengerInterface;

    /**
     * @param string $value
     * @return mixed
     */
    public function setMessage(string $value): MessengerInterface;

    /**
     * @return bool
     */
    public function send(): bool;
}
