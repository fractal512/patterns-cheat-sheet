<?php


use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\DesignPatterns\Structural\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;

return [
    'fromWeb' => [
        [
            'name' => 'log',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorLogger::class,
        ],
        [
            'name' => 'notifyUsers',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorNotifierUsers::class,
        ],
        [
            'name' => 'notifyManagers',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorNotifierManagers::class,
        ],
    ],

    'fromAdmin' => [
        [
            'name' => 'log',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorLogger::class,
        ],
        [
            'name' => 'notifyManagers',
            'enabled' => 1,
            'decorator_class' => OrderUpdateDecoratorNotifierManagers::class,
        ],
    ],
];
