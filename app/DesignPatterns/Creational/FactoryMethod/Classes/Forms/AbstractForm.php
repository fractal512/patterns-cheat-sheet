<?php


namespace App\DesignPatterns\Creational\FactoryMethod\Classes\Forms;


use App\DesignPatterns\Creational\AbstractFactory\Interfaces\GuiFactoryInterface;
use App\DesignPatterns\Creational\FactoryMethod\Interfaces\FormInterface;

abstract class AbstractForm implements FormInterface
{

    public function render()
    {
        $guiKit = $this->createGuiKit();
        $result = [];
        $result[] = $guiKit->buildCheckBox()->draw();
        $result[] = $guiKit->buildButton()->draw();

        return $result;
    }

    abstract function createGuiKit(): GuiFactoryInterface;
}
