<?php

// @todo remove
namespace app\product\drink;


class PriceDrink
{
    static public function getPrice(Drink $drink)
    {
        $price = 0;
        switch ($drink->getName()) {
            case 'coca-cola':
                switch ($drink->getVolume()) {
                    case '0.5':
                        $price += 10;
                        break;
                    case '1':
                        $price += 13;
                        break;
                    case '2':
                        $price += 15;
                        break;
                }
                break;
        }

        return $price;
    }
}