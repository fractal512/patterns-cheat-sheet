<?php


namespace App\DesignPatterns\Creational\LazyInitialization;


class LazyInitialization
{
    private $user = null;

    public function __construct()
    {
        // Non-lazy initialization. Bad design.
        //$this->user = new LazyInitializationUser();
    }

    /**
     * @return null
     */
    public function getUser()
    {
        if(is_null($this->user)){
            $this->user = new LazyInitializationUser();
        }
        return $this->user;
    }

    public function getSomeOtherObject()
    {
        //
    }
}
