<?php

namespace app\product\drink;

use app\order\CartProductInterface;
use app\order\Nameable;
use app\product\InterfaceProduct;

// @todo split to files
interface BottleInterface
{
    public function getVolume(): float;
}

class Drink implements InterfaceProduct, Nameable, CartProductInterface, BottleInterface
{
    private $volume;
    private $name;
    private $type = InterfaceProduct::BASIC_PRODUCT_TYPE;
    private $drinkPrice;

    public function __construct(StrategyFactoryInterface $strategyBuilder, string $name, float $volume)
    {
        $this->volume = $volume;
        $this->name = $name;
        $this->drinkPrice = $strategyBuilder->getStrategy($this);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getVolume(): float
    {
        return $this->volume;
    }

    public function getPrice()
    {
        return $this->drinkPrice->getPrice();
    }

    public function getDescription()
    {
        return $this->getName() . ' ' . $this->getVolume() . ' l .';
    }

    public function getType()
    {
        return $this->type;
    }

    public function getHash()
    {
        return uniqid();
    }
}