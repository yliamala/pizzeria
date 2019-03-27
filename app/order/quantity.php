<?php

namespace app\order;

class Quantity
{
    /** @var float */
    private $qty;
    /** @var CartItemInterface */
    private $item;

    public function __construct(CartItemInterface $priceable, float $qty)
    {
        $this->qty = $qty;
        $this->item = $priceable;
    }

    public function getSum(): float
    {
        return $this->item->getPrice() * $this->qty;
    }

    public function getItem(): CartItemInterface
    {
        return $this->item;
    }

}
