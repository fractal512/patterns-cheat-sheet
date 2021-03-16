<?php


namespace App\DesignPatterns\Fundamental\PropertyContainer;


use App\DesignPatterns\Fundamental\PropertyContainer\Interfaces\PropertyContainerInterface;

/**
 * Class PropertyContainer
 * @package App\DesignPatterns\Fundamental\PropertyContainer
 *
 * @url http://127.0.0.1:8000/fundamentals/property-container
 */
class PropertyContainer implements PropertyContainerInterface
{
    /**
     * @var array
     */
    private $propertyContainer = [];

    /**
     * @return string
     */
    public static function getDescription(){
        return 'Property Container Pattern description';
    }

    /**
     * @param $propertyName
     * @param $value
     */
    public function addProperty($propertyName, $value)
    {
        $this->propertyContainer[$propertyName] = $value;
    }

    /**
     * @param $propertyName
     * @return mixed|void
     */
    public function deleteProperty($propertyName)
    {
        unset($this->propertyContainer[$propertyName]);
    }

    /**
     * @param $propertyName
     * @return mixed|null
     */
    public function getProperty($propertyName)
    {
        return $this->propertyContainer[$propertyName] ?? null;
    }

    /**
     * @param $propertyName
     * @param $value
     * @return mixed|void
     * @throws \Exception
     */
    public function setProperty($propertyName, $value)
    {
        if (!isset($this->propertyContainer[$propertyName])){
            throw new \Exception("Property [{$propertyName}] not found");
        }

        $this->propertyContainer[$propertyName] = $value;
    }
}
