<?php
//mysql connection
require('database/DbController.php');

require('database/Product.php');

require('database/Cart.php');

$db = new DbController();

$product = new Product($db);

$product_shuffle = $product->getData();

$cart = new Cart($db);