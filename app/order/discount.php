<?php

namespace app\order;


class Discount
{
    private $discount = 10;
    private $maxAmount = 3000;
    private $order;
    
    public function __construct(Order $order)
    {
        $this->order = $order;
    }
    
    public function getDiscount()
    {
        if ($this->order->getSubTotalAmount() >= $this->maxAmount) {
            return $this->discount / 100 * $this->order->getSubTotalAmount();
        }
    }
}