<?php


namespace App\DesignPatterns\Structural\Composite\Orders\Models;


use App\DesignPatterns\Structural\Composite\Orders\Interfaces\CompositeItemInterface;
use App\DesignPatterns\Traits\DispatchesLaravelLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Ingredient extends Model implements CompositeItemInterface
{
    use DispatchesLaravelLog;

    public $type = 'Ingredient';

    public function calcPrice(): float
    {
        if($this->price){
            $this->logMessage("[$this->id] {$this->type}::{$this->name} = {$this->price}");
            return $this->price;
        }

        $this->price = Arr::random([10, 20, 30, 40, 50,]);

        $this->logMessage("[$this->id] {$this->type}::{$this->name} = {$this->price}");

        return $this->price;
    }
}
