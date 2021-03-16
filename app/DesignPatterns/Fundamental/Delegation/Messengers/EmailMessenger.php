<?php


namespace App\DesignPatterns\Fundamental\Delegation\Messengers;


use Illuminate\Support\Facades\Log;

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
        Log::info('Sent by ' . __METHOD__);
        return parent::send();
    }
}
