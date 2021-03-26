<?php


namespace App\DesignPatterns\Structural\Composite\Orders\Models;


use App\DesignPatterns\Structural\Composite\Orders\Interfaces\CompositeInterface;
use App\DesignPatterns\Structural\Composite\Orders\Traits\CompositeTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements CompositeInterface
{
    use CompositeTrait;

    public $type = 'Product';
}
