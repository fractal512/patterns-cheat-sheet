<?php

namespace App\Providers;

use App\DesignPatterns\Creational\Singleton\Contracts\AnotherConnection;
use App\DesignPatterns\Creational\Singleton\LaravelSingleton;
use App\DesignPatterns\Structural\Adapter\Classes\MediaLibraryAdapter;
use App\DesignPatterns\Structural\Adapter\Classes\MediaLibrarySelfWritten;
use App\DesignPatterns\Structural\Adapter\Interfaces\MediaLibraryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $singletons = [
        AnotherConnection::class => LaravelSingleton::class,
        //LaravelSingleton::class => LaravelSingleton::class,
    ];

    public $bindings = [
        //MediaLibraryInterface::class => MediaLibrarySelfWritten::class,
        MediaLibraryInterface::class => MediaLibraryAdapter::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
