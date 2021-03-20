<?php


namespace App\DesignPatterns\Fundamental\Delegation\Messengers;


use App\DesignPatterns\Fundamental\Delegation\Interfaces\MessengerInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;

abstract class AbstractMessenger implements MessengerInterface
{
    use DispatchesLaravelLog;

    /**
     * @var string
     */
    protected $sender;

    /**
     * @var string
     */
    protected $recipient;

    /**
     * @var string
     */
    protected $message;

    /**
     * @param string $value
     * @return $this|MessengerInterface
     */
    public function setSender(string $value): MessengerInterface
    {
        $this->sender = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this|MessengerInterface
     */
    public function setRecipient(string $value): MessengerInterface
    {
        $this->recipient = $value;
        return $this;
    }

    /**
     * @param string $value
     * @return $this|MessengerInterface
     */
    public function setMessage(string $value): MessengerInterface
    {
        $this->message = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function send(): bool
    {
        return true;
    }
}
