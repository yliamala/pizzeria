<?php

namespace app\user;


use app\order\Order;

class Cook extends Employee
{
    protected $excludeOrderStatus = [Order::SUBMITTED_STATUS];

}