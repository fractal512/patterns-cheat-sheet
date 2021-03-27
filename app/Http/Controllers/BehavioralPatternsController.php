<?php

namespace App\Http\Controllers;


use App\DesignPatterns\Behavioral\Strategy\SalaryManager;
use App\Models\User;
use Carbon\Carbon;

class BehavioralPatternsController extends Controller
{
    public function Strategy()
    {
        $name = 'Strategy';
        $this->clearLaravelLog()->logMessage($name);

        $period = [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth(),
        ];
        //$users = User::all();
        $users = [];

        for($i=0; $i<2; $i++){
            $users[] = new User();
        }

        $users = collect($users);

        $result = (new SalaryManager($period, $users))->handle();

        $this->logMessage(print_r($result, true));

        return view('strategy', compact('name'));
    }
}
