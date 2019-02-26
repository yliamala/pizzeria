<?php

namespace app\order;

use app\order\payment\AbstractPayment;

class Order
{
    const SUBMITTED_STATUS = 'Submitted';
    const CONFIRMED_STATUS = 'Confirmed';
    const DELIVERED_STATUS = 'Delivered';
    /**
     * @var Cart
     */
    private $cart;
    private $pizzeria;
    private $payment;
    private $status = self::SUBMITTED_STATUS;
    private $cook;
    private $manager;
    private $discount = 0;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
        $this->setDiscount();
    }

    public function getSubTotalAmount()
    {
        return $this->cart->getTotalAmount();
    }

    public function setDiscount()
    {
        $this->discount = (new Discount($this))->getDiscount();
    }

    public function getDiscount()
    {
        return $this->discount;
    }

    public function getTotalAmount()
    {
        return ($this->getSubTotalAmount() - $this->getDiscount());
    }

    public function getPizzeria($pizzeria)
    {
        $this->pizzeria = $pizzeria;
    }

    public function setPayment(AbstractPayment $pay)
    {
        $this->payment = $pay->getName();
    }

    public function getCart()
    {
        return $this->cart;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function setCook($cook)
    {
        $this->cook = $cook;
    }

    public function getCook()
    {
        return $this->cook;
    }

    public function setManager($manager)
    {
        $this->manager = $manager;
    }

    public function getManager()
    {
        return $this->manager;
    }
}