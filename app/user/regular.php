<?php

namespace app\user;


class Regular extends Customer
{
    protected $type = Customer::REGULAR;
    protected $basicProduct = true;
    protected $additionalProduct = true;
    protected $historyOrder = true;
}