<?php
use SuperMarket\models\Offer;
use SuperMarket\models\Product;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

$product = new Product();
$offer = new Offer();

echo($offer->getOffer(1)->offer_price);