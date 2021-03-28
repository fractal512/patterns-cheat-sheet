<?php


namespace App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators;


class OrderUpdateDecoratorLogger extends OrderUpdateDecoratorAbstract
{
    protected function actionBefore()
    {
        $this->logMessage('Log Before');
    }

    protected function actionAfter()
    {
        $this->logMessage('Log After');
    }
}
