<?php
namespace app\product\drink;

use app\product\InterfaceProduct;

class Drink implements InterfaceProduct
{
    private $volume;
    private $name;
    private $type = InterfaceProduct::BASIC_PRODUCT_TYPE;

    public function __construct($name, $volume)
    {
        $this->volume = $volume;
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getVolume()
    {
        return $this->volume;
    }

    public function getPrice()
    {
        return (new PriceDrink($this))->getPrice();
    }

    public function getDescription()
    {
        return $this->getName() . ' ' . $this->getVolume() . ' l .';
    }

    public function getType()
    {
        return $this->type;
    }
}