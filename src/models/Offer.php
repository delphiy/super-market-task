<?php

namespace SuperMarket\models;

class Offer
{
    //In real application, the following data will be in database
    private $offers = [
        [
            'id' => 1,
            'product_id' => 1,
            'quantity' => 3,
            'offer_price' => 130
        ],
        [
            'id' => 2,
            'product_id' => 1,
            'quantity' => 2,
            'offer_price' => 45
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