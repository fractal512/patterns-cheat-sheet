<?php


namespace App\DesignPatterns\Behavioral\Strategy\Interfaces;


use App\Models\User;

interface SalaryStrategyInterface
{
    public function calc(array $period, User $user): int;

    public function getName(): string;
}
