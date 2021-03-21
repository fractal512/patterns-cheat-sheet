<?php


namespace App\DesignPatterns\Creational\SimpleFactory;


use App\DesignPatterns\Creational\SimpleFactory\Interfaces\MessengerSimpleFactoryInterface;
use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;
use App\DesignPatterns\Fundamental\Delegation\Messengers\EmailMessenger;
use App\DesignPatterns\Fundamental\Delegation\Messengers\SmsMessenger;

class MessengerSimpleFactory implements MessengerSimpleFactoryInterface
{
    public function build(string $type = 'email'): MessengerInterface
    {
        switch ($type) {
            case 'email':
                $messenger = new EmailMessenger();
                $messenger
                    ->setSender('admin@site.local')
                    ->setRecipient('recipient@site.local')
                    ->setMessage('Default EMAIL message');
                break;

            case 'sms':
                $messenger = new SmsMessenger();
                $messenger
                    ->setSender('0931234567')
                    ->setRecipient('0631234567')
                    ->setMessage('Default PHONE message');
                break;

            default:
                throw new \Exception('Unknown type [{$type}]');
        }

        return $messenger;
    }
}
