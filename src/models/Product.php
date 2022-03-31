<?php

namespace SuperMarket\models;

class Product
{
    //In real application, the following data will be in database
    private $products = [
        [
            'id' => 1,
            'name' => 'A',
            'unit_price' => 50,
            'offer_type' => 1
        ],
        [
            'id' => 2,
            'name' => 'B',
            'unit_price' => 30,
            'offer_type' => 1
        ],
        [
            'id' => 3,
            'name' => 'C',
            'unit_price' => 20,
            'offer_type' => 2
        ],
        [
            'id' => 4,
            'name' => 'D',
            'unit_price' => 15,
            'offer_type' => 3
        ],
        [
            'id' => 5,
            'name' => 'E',
            'unit_price' => 5,
            'offer_type' => 0 // no offer
        ]
    ];

    public function __construct()
    {
    }

    public function getProduct($id)
    {
        $i = array_search($id, array_column($this->products, 'id'));
        return $i !== false ? (object) $this->products[$i] : null;
    }
}