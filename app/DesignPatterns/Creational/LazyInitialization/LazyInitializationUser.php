<?php


namespace App\DesignPatterns\Creational\LazyInitialization;


class LazyInitializationUser
{
    public $name;

    public $email;

    public $created_at;

    public function __construct()
    {
        // Resource consuming object simulation.
        // Object construction is taking some time...
        sleep(1);
        $this->name = 'User';
        $this->email = 'mail@example.com';
        $this->created_at = '2021-03-23 12:46:15';
    }
}
