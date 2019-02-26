<?php

namespace app\order;


use app\product\InterfaceProduct;
use app\user\Customer;

class Cart
{
    private $totalAmount = 0;
    private $items;
    /**
     * @var Customer
     */
    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addProduct(InterfaceProduct $product, $qty = 1)
    {
        if (!$this->checkProduct($product)) throw new \Exception('You do not have access to this product.');
        $item = new Item($product, $qty);
        $this->items[$item->getId()] = $item;
        $this->addItemTotalAmount($item);
    }

    private function checkProduct(InterfaceProduct $product)
    {
        return $this->customer->getProductPerm($product->getType());
    }

    private function addItemTotalAmount(Item $item)
    {
        $this->totalAmount += $item->getPrice();
    }

    public function deleteProduct($id)
    {
        unset($this->items[$id]);
        $this->reCalculateTotalAmount();
    }

    private function reCalculateTotalAmount()
    {
        $this->totalAmount = 0;
        if (!count($this->items)) return;

        foreach ($this->items as $item) {
            $this->totalAmount += $item->getPrice();
        }
    }

    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function getItem()
    {
        return $this->items;
    }

    public function getCustomer()
    {
        return $this->customer;
    }
}