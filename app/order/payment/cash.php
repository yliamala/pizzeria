<?php

namespace app\order\payment;


class Cash extends AbstractPayment
{
    const MAX_AMOUNT = 5000;

    protected $name = 'cash';

    public function enable()
    {
        $customer = $this->order->getCart()->getCustomer();
        if ($this->order->getTotalAmount() >= self::MAX_AMOUNT && !$customer->getAlwaysCash()) {
            return false;
        }
        return true;
    }
}