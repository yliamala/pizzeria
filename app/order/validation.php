<?php

namespace app\order;


use app\user\Customer;

class Validation
{
    private $order;
    private $minTotalAmount = 700;
    private $minTotalCustomer = [Customer::VIP => 500];

    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->setMinTotalAmount();
        if (!$this->validTotalAmount()) throw new \Exception('Minimum order amount ' . $this->minTotalAmount);
    }
    
    private function validTotalAmount()
    {
        return ($this->order->getTotalAmount() >= $this->minTotalAmount);
    }

    private function setMinTotalAmount()
    {
//        $typeCustomer = $this->order->getCart()->getCustomer()->getType();
        if (!empty($this->minTotalCustomer[$typeCustomer])) {
            $this->minTotalAmount = $this->minTotalCustomer[$typeCustomer];
        }
    }
}