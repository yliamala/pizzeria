<?php

namespace app\product\pizza;

use app\order\CartItemInterface;
use app\order\Nameable;
use app\order\Priceable;
use app\product\InterfaceProduct;

class Pizza implements InterfaceProduct, Nameable, CartItemInterface
{
    private $dough;
    private $size;
    private $ingredient;
    private $type = InterfaceProduct::UNIQUE_PRODUCT_TYPE;

    public function __construct($dough, $size)
    {
        $this->dough = $dough;
        $this->size = $size;
    }

    public function addIngredient(Ingredient $ingredient)
    {
        $this->ingredient[] = $ingredient;
    }

    public function getDough()
    {
        return $this->dough;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getIngredient()
    {
        return $this->ingredient;
    }

    public function getPrice()
    {
        return (new PricePizza($this))->getPrice();
    }

    public function getWeight()
    {
        return (new WeightPizza($this))->getWeight();
    }

    public function getDescription()
    {
        $description = 'Pizza with ' . $this->getDough() . ' dough, size ' . $this->getSize() . ' ';
        if (!count($this->getIngredient())) return;
        foreach ($this->getIngredient() as $ingredient) {
            $description .= ', with ' . $ingredient->getName();
        }
        $description .= '.';
        return $description;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getName()
    {
        return self::class;
    }

    public function getHash()
    {
        return uniqid();
    }


}