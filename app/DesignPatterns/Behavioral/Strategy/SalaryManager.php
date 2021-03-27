<?php


namespace App\DesignPatterns\Behavioral\Strategy;


use App\DesignPatterns\Behavioral\Strategy\Interfaces\SalaryStrategyInterface;
use App\Models\User;
use Illuminate\Support\Collection;

class SalaryManager
{
    private $salaryStrategy;

    private $period;

    private $users;

    public function __construct(array $period, Collection $users)
    {
        $this->period = $period;
        $this->users = $users;
    }

    public function handle()
    {
        $usersSalary = $this->calculateSalary();
        $this->saveSalary($usersSalary);
        return $usersSalary;
    }

    private function calculateSalary(): Collection
    {
        $usersSalary = $this->users->map(
            function (User $user) {
                $strategy = $this->getStrategyByUser($user);
                $salary = $this
                    ->setCalculateStrategy($strategy)
                    ->calculateUserSalary($this->period, $user);

                $strategyName = $strategy->getName();
                $userId = $user->id;

                $newItem = compact('userId', 'salary', 'strategyName');

                return $newItem;
            }
        );

        return $usersSalary;
    }

    private function saveSalary(Collection $usersSalary)
    {
        return true;
    }

    private function getStrategyByUser(User $user): SalaryStrategyInterface
    {
        $strategyName = $user->departmentName() . 'Strategy';
        $strategyClass = __NAMESPACE__ . '\\Strategies\\' . ucwords($strategyName);

        throw_if(!class_exists($strategyClass), \Exception::class,
            "Class doesn't exist [{$strategyClass}]");

        return new $strategyClass;
    }

    private function calculateUserSalary($period, $user)
    {
        return $this->salaryStrategy->calc($period, $user);
    }

    private function setCalculateStrategy(SalaryStrategyInterface $strategy)
    {
        $this->salaryStrategy = $strategy;

        return $this;
    }
}
