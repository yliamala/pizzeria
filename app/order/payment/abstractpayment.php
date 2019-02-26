<?php

namespace app\order\payment;


use app\order\Order;

abstract class AbstractPayment
{
    protected $name;
    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
        if (!$this->enable()) throw new \Exception('You can not payment this method.');
    }

    public function enable()
    {
        return true;
    }

    public function getName()
    {
        if (empty($this->name)) {
            throw new \Exception('Payment method name is not set');
        }
        return $this->name;
    }
}