<?php

use app\library\Router;
use Exception;

require '../vendor/autoload.php';


/*$products = [
  1 => ['id' => 1, 'name' => 'geladeira', 'price' => 1000.00, 'quantity' => 1],
  2 => ['id' => 2, 'name' => 'mouse', 'price' => 100.00, 'quantity' => 1],
  3 => ['id' => 3, 'name' => 'teclado', 'price' => 10.00, 'quantity' => 1],
  4 => ['id' => 4, 'name' => 'monitor', 'price' => 5000.00, 'quantity' => 1],
];*/

try{
  $route = new Router;
  $route->add('/', 'GET', 'HomeController:index');
  $route->add('/cart', 'GET', 'CartController:index');
  $route->add('/cart/add', 'GET', 'CartController:add');
  $route->add('/login', 'GET', 'LoginController:index');
  $route->add('/login', 'POST', 'LoginController:store');
  $route->add('/cart/add', 'GET', 'CartController:store');
  $route->init();

}catch(Exception $e){
  var_dump($e->getMessage().' '.$e->getFile().' '.$e->getLine());
}

/*
if (isset($_GET['id'])) {
  $id = strip_tags($_GET['id']);
  $productInfo = $products[$id];
  $product = new Product;
  $product->setId($productInfo['id']);
  $product->setName($productInfo['name']);
  $product->setPrice($productInfo['price']);
  $product->setQuantity($productInfo['quantity']);

  $cart = new Cart;
  $cart->add($product);
}

var_dump($_SESSION['cart'] ?? []);*/