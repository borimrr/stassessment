<?php
require_once('Customer.php');
require_once('StoreItem.php');
require_once('ShoppingCart.php');

$customer = new Customer(
    'Doc',
    'Brown',
    [
        [
            'address_1' => '1640 Riverside Dr',
            'address_2' => null,
            'city' => 'Hill Valley',
            'state' => 'CA',
            'zip' => '95420'
        ],
        [
            'address_1' => '123 Sesame St',
            'address_2' => 'Apt 101',
            'city' => 'Tampa',
            'state' => 'FL',
            'zip' => '33610'
        ]
    ]
);
$item = new StoreItem(1, 'Flux Capacitor', 20, [12, 12, 12], 10, 1000);
$item2 = new StoreItem(2, 'Tire', 10, [18, 18, 10], 2, 80);
$cart = new ShoppingCart($customer, [$item, $item2]);

echo "Customer info: \n";
echo printf(var_dump($customer->getFirstName(), $customer->getLastName(), $customer->getAddresses()));

echo "\n\n";
echo "Cart items: \n";
echo print_r(var_dump($cart->getItems()));

echo "\n\n";
echo "Shipping address: \n";
echo print_r(var_dump($cart->getShippingAddress()));

echo "\n\n";
echo "First item total (USD): \n";
echo print_r(var_dump($cart->getTotalForItem($item->getId())));

echo "\n\n";
echo "Cart subtotal (USD): \n";
echo print_r(var_dump($cart->getSubTotal()));

echo "\n\n";
echo "Cart total (USD): \n";
echo print_r(var_dump($cart->getTotal()));

