<?php

namespace app\order;

use app\order\payment\AbstractPayment;
use app\user\Employee;

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
    private $paid = false;

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

    public function setPizzeria($pizzeria)
    {
        $this->pizzeria = $pizzeria;
    }

    public function getPizzeria()
    {
        return $this->pizzeria;
    }

    public function setPayment(AbstractPayment $pay)
    {
        $pay->enable($this);
        $this->payment = $pay;
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

    public function getPaid()
    {
        return $this->paid;
    }

    public function setPaid(Employee $employee)
    {
        if (!$this->payment->getSetPaid()) throw new \Exception('For cash only.');
        if (!$employee->getAllowPaid()) throw new \Exception('You can not pay the order.');
        $this->paid = true;
    }

    public function changeStatus(Employee $employee, $status)
    {
        if (($employee->getConfirmedOrder() && $status == Order::CONFIRMED_STATUS) ||
            ($employee->getDeliveredOrder() && $status == Order::DELIVERED_STATUS))
        {
            $this->setStatus($status);
        } else {
            throw new \Exception('You can not change status.');
        }
    }
}