<?php

namespace app\pizzeria;

class Pizzeria
{
    private $name;
    private $address;

    public function __construct($name)
    {
        $this->name = $name;
        $this->setAddress();
    }

    public static function getPizzeriaList()
    {
        return [
            'City' => 'street 2, Austin, 78759, TX, USA',
            'For you' => 'street 57, Austin, 78759, TX, USA'
        ];
    }

    public function setAddress()
    {
        $listPizzeria = $this->getPizzeriaList();
        if (empty($listPizzeria[$this->name])) throw new \Exception($this->name . ' pizzeria is not exist.');
        $this->address = $listPizzeria[$this->name];
    }
}