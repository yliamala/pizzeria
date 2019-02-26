<?php

namespace app\order\payment;


use app\order\Order;

class Cash extends AbstractPayment
{
    const MAX_AMOUNT = 5000;

    protected $name = 'cash';
    protected $setPaid = true;

    public function enable(Order $order)
    {
        $customer = $order->getCart()->getCustomer();
        if ($order->getTotalAmount() >= self::MAX_AMOUNT && !$customer->getAlwaysCash()) {
            return false;
        }
        return true;
    }
}