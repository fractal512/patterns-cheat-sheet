<?php


namespace App\DesignPatterns\Fundamental\Delegation\Messengers;


/**
 * Class EmailMessenger
 * @package App\DesignPatterns\Fundamental\Delegation\Messengers
 */
class EmailMessenger extends AbstractMessenger
{
    /**
     * @return bool
     */
    public function send(): bool
    {
        $this->logMessage('Sent by ' . __METHOD__);
        return parent::send();
    }
}
