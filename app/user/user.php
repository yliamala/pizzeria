<?php

namespace app\user;


class User
{
    private $user;

    public function __construct(Customer $user)
    {
        $this->user = $user;
    }
}