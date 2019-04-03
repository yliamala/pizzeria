<?php

namespace app\order;


interface CartInterface extends \Iterator
{

    public function addItem(CartItemInterface $cartItem, float $qty);

    public function removeItem(CartItemInterface $cartItem);

    public function getTotalSum(): float;
}