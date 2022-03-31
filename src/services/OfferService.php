<?php
namespace SuperMarket\services;

use SuperMarket\enums\OfferType;
use SuperMarket\models\Offer;
use SuperMarket\models\Offer2;
use SuperMarket\models\Product;

/**
 * Class OfferService
 * @package SuperMarket\services
 */
class OfferService
{
    public function __construct() {
    }

    /**
     * @param $baskets
     * @return float|int
     */
    public function total($baskets) {
        //In laravel framework, we will access to model directly because it facade
        $product = new Product();
        $total = 0;
        foreach($baskets as $basket) {
            $productID = $basket->product_id;
            $product = $product->getProduct($productID);

            switch ($product->offer_type) {
                case OfferType::Offer1:
                    $total += $this->handleOffer1($product, $basket);
                    break;
                case OfferType::Offer2:
                    $total += $this->handleOffer2($product, $basket);
                    break;
            }

        }

        return $total;
    }

    /**
     * @param $product
     * @param $basket
     * @return float|int
     */
    private function handleOffer1($product, $basket) {
        $offer = new Offer();
        $offer = $offer->getOffer($product->id);
        $basketQuantity = $basket->quantity;

        //No offer
        if(!$offer || $basketQuantity < $offer->quantity) {
            return $product->unit_price * $basketQuantity;
        }

        if($basketQuantity % $offer->quantity == 0) {
            $sum = $basketQuantity / $offer->quantity * $offer->offer_price;
        } else {
            $offerTotal = floor($basketQuantity / $offer->quantity) *
                $offer->offer_price;

            $noOfferTotal = $product->unit_price * ($basketQuantity - $offer->quantity);

            $sum = $offerTotal + $noOfferTotal;
        }

        return $sum;
    }

    /**
     * @param $product
     * @param $basket
     * @return float|int
     */
    private function handleOffer2($product, $basket) {
        $offer = new Offer2();
        $offer = $offer->getOffer($product->id);
        $basketQuantity = $basket->quantity;

        //No offer
        if($basketQuantity < $offer->first_quantity) {
            return $product->unit_price * $basketQuantity;
        }

        //Offer for first quantity
        if($basketQuantity == $offer->first_quantity) {
            return $offer->price_first_quantity;
        }

        //Offer for second quantity
        if($basketQuantity == $offer->second_quantity) {
            return $offer->price_second_quantity;
        }


        return 0;
    }

}