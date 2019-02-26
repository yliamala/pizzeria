<?php

namespace app\product\drink;


class PriceDrink
{
    private $price = 0;
    private $drink;

    public function __construct(Drink $drink)
    {
        $this->drink = $drink;
        $this->setPriceByDrink();
    }

    public function getPrice()
    {
        return $this->price;
    }

    private function setPriceByDrink()
    {
        switch ($this->drink->getName()) {
            case 'coca-cola':
                switch ($this->drink->getVolume()) {
                    case '0.5':
                        $this->price += 10;
                        break;
                    case '1':
                        $this->price += 13;
                        break;
                    case '2':
                        $this->price += 15;
                        break;
                }
                break;
        }
    }
}