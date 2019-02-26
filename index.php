<?php

require_once ('autoloader.php');
try{
    // Create product
    $pizza = new \app\product\pizza\Pizza('standard', 26);
    $pizza->addIngredient(new \app\product\pizza\Ingredient('onions'));
    $pizza->addIngredient(new \app\product\pizza\Ingredient('olives'));

    $burger = new \app\product\burger\Burger('white', 'well done');
    $burger->addCheese()->addDoubleCutlet();

    $drink = new \app\product\drink\Drink('coca-cola', 1);

// Create user
    $vip = new \app\user\Vip('Julia', '09872227733');
// Create cart
    $cart = new \app\order\Cart($vip);

// Add product
    $cart->addProduct($pizza, 20);
    $cart->addProduct($pizza, 60);
    $cart->addProduct($burger, 10);
    $cart->addProduct($drink);

//print_r($order);
// Delete product example
    $items = $cart->getItem();
    $keys = array_keys($items);
    $firstKey = $keys[0];
    $cart->deleteProduct($firstKey);
//print_r($order);
    (new \app\order\PrintCart($cart))->printCart();

// Get address pizzeria
    echo 'Select Pizzeria: ' . "\n";
    print_r( \app\pizzeria\Pizzeria::getPizzeriaList());
// Create Order
    $order = new \app\order\Order($cart);
    $order->getPizzeria(new \app\pizzeria\Pizzeria('City'));
    $payment = new \app\order\payment\Cash($order);
    $order->setPayment($payment);
    (new \app\order\SaveOrder($order))->save();
    $order->setCook(new \app\user\Cook('Piter'));
    $order->setManager(new \app\user\Manager('Michel'));

    $surprise = new \app\order\Surprise($order);
    if ($surprise) {
        $drink = new \app\product\drink\DrinkSurprise('coca-cola', 0.5);
        $order->getCart()->addProduct($drink);
    }

    echo 'Sub Total amount: ' . $order->getSubTotalAmount() . "\n";
    echo 'Discount: ' . $order->getDiscount() . "\n";
    echo 'Total amount: ' . $order->getTotalAmount() . "\n";

    $vip->viewCurrentStatusOrder();
    $vip->viewHistoryOrder();
} catch (Exception $e) {
    echo 'Error: ';
    print_r($e->getMessage());
    echo "\n";
}