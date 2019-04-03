<?php

namespace app\order;

class Cart implements CartInterface
{
    private $totalAmount = 0;
    /** @var Quantity[] */
    private $items = [];

    public function addItem(CartItemInterface $cartItem): self
    {
        $this->items[$cartItem->getHash()] = new Quantity($cartItem, 1);
        $this->totalAmount += $cartItem->getPrice();

        return $this;
    }

    public function removeItem(CartItemInterface $cartItem)
    {
        unset($this->items[$cartItem->getHash()]);
        $this->reCalculateTotalAmount();

        return $this;
    }

    private function reCalculateTotalAmount()
    {
        $this->totalAmount = 0;
        if (!count($this->items)) return;

        foreach ($this->items as $item) {
            $this->totalAmount += $item->getSum();
        }
    }

    public function getTotalSum(): float
    {
        return $this->totalAmount;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function current(): CartItemInterface
    {
        // TODO: Implement valid() method.
    }

    public function next(): CartItemInterface
    {
        // TODO: Implement valid() method.
    }

    public function key()
    {
        // TODO: Implement valid() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

}