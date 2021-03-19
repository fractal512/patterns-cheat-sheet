<?php


namespace App\DesignPatterns\Creational\StaticFactory;


use App\DesignPatterns\Creational\StaticFactory\Interfaces\MessengerStaticFactoryInterface;
use App\DesignPatterns\Fundamental\Delegation\AppMessenger;
use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;

class StaticFactory implements MessengerStaticFactoryInterface
{
    public static function build(string $type = 'email'): MessengerInterface
    {
        $messenger = new AppMessenger();

        switch ($type) {
            case 'email':
                $messenger->toEmail();
                $sender = 'admin@site.local';
                $recipient = 'recipient@mail.com';
                break;

            case 'sms':
                $messenger->toSms();
                $sender = '0931234567';
                $recipient = '0631234567';
                break;

            default:
                throw new \Exception('Unknown type [{$type}]');
        }

        $messenger
            ->setSender($sender)
            ->setRecipient($recipient)
            ->setMessage('Default message');

        return $messenger;
    }
}
