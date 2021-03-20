<?php


namespace App\DesignPatterns\Traits;


use Illuminate\Support\Facades\Log;

trait DispatchesLaravelLog
{
    protected function clearLaravelLog()
    {
        file_put_contents(storage_path('logs/laravel.log'),'');
        return $this;
    }

    protected function logMessage($message)
    {
        Log::info($message);
        return $this;
    }
}
