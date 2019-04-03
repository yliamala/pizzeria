<?php

namespace app\order;


use app\user\Customer;

class Validation
{
    private $order;
    private $minTotalAmount = 700;
    private $minTotalCustomer = [Customer::VIP => 500];

    public function __construct(Order $order, Customer $customer)
    {
        $this->order = $order;
        if (!empty($this->minTotalCustomer[$customer->getType()])) {
            $this->minTotalAmount = $this->minTotalCustomer[$customer->getType()];
        }
        if (!$this->validTotalAmount()) {
            throw new \Exception('Minimum order amount ' . $this->minTotalAmount);
        }
    }
    
    private function validTotalAmount()
    {
        return ($this->order->getTotalAmount() >= $this->minTotalAmount);
    }
}