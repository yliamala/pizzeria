<?php

namespace app\order;

class SaveOrder
{

    private $order;
    private $path = __DIR__ . '/ordersfile/';

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function save()
    {
        file_put_contents($this->path . time() . '.txt', serialize($this->order));
    }
}