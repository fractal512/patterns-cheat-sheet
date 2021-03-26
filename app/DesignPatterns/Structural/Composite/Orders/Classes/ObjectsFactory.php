<?php


namespace App\DesignPatterns\Structural\Composite\Orders\Classes;


use App\DesignPatterns\Structural\Composite\Orders\Models\Ingredient;
use App\DesignPatterns\Structural\Composite\Orders\Models\Order;
use App\DesignPatterns\Structural\Composite\Orders\Models\Product;
use Illuminate\Support\Arr;

class ObjectsFactory
{
    private $faker;

    public function __construct()
    {
        $this->faker = app(\Faker\Generator::class);
    }

    public function createIngredients(int $cnt): array
    {
        $result = [];

        for ($i=1; $i <= $cnt; $i++) {
            $result[] = $this->createIngredient($i);
        }

        return $result;
    }

    private function createIngredient(int $id)
    {
        $obj = new Ingredient();
        $obj->id = $id;
        $obj->name = $this->faker->colorName;

        return $obj;
    }

    public function createProducts(int $cnt, array $ingredients): array
    {
        $result = [];

        for ($i = 1; $i <= $cnt; $i++) {
            $productIngredients = Arr::random($ingredients, rand(2, 3));

            $result[] = $this->createProduct($i, $productIngredients);
        }

        return $result;
    }

    private function createProduct(int $id, array $ingredients)
    {
        $obj = new Product();
        $obj->id = $id;
        $obj->name = $this->faker->company;

        foreach ($ingredients as $ingredient) {
            $obj->setChildItem($ingredient);
        }

        return $obj;
    }

    public function createOrders(int $cnt, array $products): array
    {
        $result = [];

        for ($i = 1; $i <= $cnt; $i++) {
            $orderProducts = Arr::random($products, rand(1, 3));

            $result[] = $this->createOrder($i, $orderProducts);
        }

        return $result;
    }

    private function createOrder(int $id, array $children)
    {
        $obj = new Order();
        $obj->id = $id;
        $obj->name = "order{$id}";

        foreach ($children as $child) {
            $obj->setChildItem($child);
        }

        return $obj;
    }
}
