<?php

namespace app\order;

interface CartItemInterface
{
    public function getSum(): float;

    public function getItem(): CartProductInterface;

    public function getQuantity(): int;
}