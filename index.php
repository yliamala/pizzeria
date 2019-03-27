<?php

require_once('autoloader.php');

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
//$items = $cart->getItems();
//$keys = array_keys($items);
//$firstKey = $keys[0];
$cart->deleteProduct($cart->key());
//print_r($order);
(new \app\order\PrintCart($cart))->printCart();

// Get address pizzeria
echo 'Select Pizzeria: ' . "\n";
print_r(\app\pizzeria\Pizzeria::getPizzeriaList());
// Create Order
$order = new \app\order\Order($cart);
$order->setPizzeria(new \app\pizzeria\Pizzeria('City', true));
$payment = new \app\order\payment\Cash($order);
$order->setPayment($payment);

$cook = new \app\user\Cook('Piter');
$order->setCook($cook);
$manager = new \app\user\Manager('Michel');
$order->setManager($manager);

$surprise = new \app\order\Surprise($order);
if ($surprise) {
    $drink = new \app\product\drink\DrinkSurprise('coca-cola', 0.5);
    $order->getCart()->addProduct($drink);
}

echo 'Sub Total amount: ' . $order->getSubTotalAmount() . "\n";
echo 'Discount: ' . $order->getDiscount() . "\n";
echo 'Total amount: ' . $order->getTotalAmount() . "\n";

// Save order
(new \app\order\SaveOrder($order))->save();
new \app\order\SendEmail($order);


$order->changeStatus($cook, \app\order\Order::CONFIRMED_STATUS);
$order->changeStatus($manager, \app\order\Order::DELIVERED_STATUS);
$vip->viewCurrentStatusOrder();
$vip->viewHistoryOrder();

// Paid order
$order->setPaid($manager);
//print_r($order);exit;

// Service
$service = new \app\service\HolidayParty('2019-03-24', 3, 'street', '0984777332');
print_r($service->getPrice());
