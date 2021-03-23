<?php


namespace App\DesignPatterns\Creational\ObjectPool;



use App\DesignPatterns\Creational\ObjectPool\Objects\Calculator;
use App\DesignPatterns\Creational\ObjectPool\Objects\CreditCard;
use App\DesignPatterns\Creational\ObjectPool\Objects\User;

class ObjectPoolDemo
{
    private $objectPool;

    public function __construct()
    {
        $this->objectPool = ObjectPool::getInstance();

        $user = new User();
        $creditCard = new CreditCard();
        $calculator = new Calculator();

        $this->objectPool
            ->addObject($user)
            ->addObject($creditCard)
            ->addObject($calculator);
    }

    public function run()
    {
        //dd(__METHOD__, 1, $this->objectPool);

        $creditCard = $this->objectPool->getObject(CreditCard::class);
        $creditCard->cardId = '1111 2222 3333 4444';
        $creditCard->cardHolder = 'CARD HOLDER';
        $creditCard->cardCVV = '123';

        $user = $this->objectPool->getObject(User::class);
        $user->name = 'USER NAME';

        $user2 = $this->objectPool->getObject(User::class);

        //dd(__METHOD__, 2, $this->objectPool, [$user, $user2]);

        $this->objectPool->release($creditCard);
        $this->objectPool->release($user);

        //dd(__METHOD__, 3, $this->objectPool);

        $creditCard2 = $this->objectPool->getObject(CreditCard::class);
        $creditCard2->cardId = '5555 6666 7777 8888';
        $creditCard2->cardHolder = 'CARD HOLDER II';
        $creditCard2->cardCVV = '456';

        dd(__METHOD__, 4, $this->objectPool, [$creditCard, $user, $user2], $creditCard2);
    }
}
