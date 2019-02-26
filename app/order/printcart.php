<?php

namespace app\order;

class PrintCart
{
    /**
     * @var Cart
     */
    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function printCart()
    {
        if (!count($this->cart->getItem())) return;

        $i = 1;
        foreach ($this->cart->getItem() as $item) {
            echo $i .'. ' . $item->getDescription() .
                '; Qty: ' . $item->getQty() . '; Unit Price:' . $item->getUnitPrice() . '; Price: ' . $item->getPrice() .". \n";
            $i++;
        }
    }
}