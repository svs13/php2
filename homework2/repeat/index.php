<?php

use App\Models\HasPrice;
use App\Models\Product;

require __DIR__ . '/autoload.php';

/*$data = Product::findAll();

//var_dump($data);

function printPrice(HasPrice $product)
{
    echo $product->getPrice() . ' руб';
}


printPrice($data[0]);
*/

$product = new Product();

$product->name = 'Nokia 3310';
$product->price = 5000;
$product->weight = 1000;

$product->insert();

var_dump($product);
