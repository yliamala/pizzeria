<?php

namespace app\order;


use app\product\InterfaceProduct;

class Item
{
    private $id;
    private $description;
    private $qty;
    private $unitPrice;
    private $price;

    public function __construct(InterfaceProduct $product, $qty)
    {
        $this->id = uniqid();
        $this->setQty($qty);
        $this->description = $product->getDescription();
        $this->unitPrice = $product->getPrice();
        $this->price = $product->getPrice() * $this->getQty();
    }

    public function setQty($qty)
    {
        $this->qty = $qty;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getId()
    {
        return $this->id;
    }
}