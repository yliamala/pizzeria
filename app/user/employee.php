<?php

namespace app\user;


class Employee
{
    protected $name;
    protected $excludeOrderStatus = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getExcludeOrderStatus()
    {
        return $this->excludeOrderStatus;
    }
}