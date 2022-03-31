<?php

namespace SuperMarket\models;

//We might give this better offer name instead of offer, for example KingOffer
class Offer2
{
    //In real application, the following data will be in database
    private $offers = [
        [
            'id' => 1,
            'product_id' => 3,
            'first_quantity' => 2,
            'price_first_quantity' => 38,
            'second_quantity' => 3,
            'price_second_quantity' => 50
        ],
    ];

    public function __construct()
    {
    }

    public function getOffer($productID)
    {
        $i = array_search($productID, array_column($this->offers, 'product_id'));
        return $i !== false ? (object) $this->offers[$i] : null;
    }
}