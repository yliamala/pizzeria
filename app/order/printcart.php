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
        $i = 1;
        /** @var Item $item */
        foreach ($this->cart as $item) {
            // @todo remake by sprintf();
            echo $i .'. ' . $item->getDescription() .
                '; Qty: ' . $item->getQty() . '; Unit Price:' . $item->getUnitPrice() . '; Price: ' . $item->getPrice() .". \n";
            $i++;
        }
    }
}