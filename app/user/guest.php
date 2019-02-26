<?php

namespace app\user;

class Guest extends Customer
{
    protected $type = Customer::GUEST;
    protected $basicProduct = true;
}