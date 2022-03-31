<?php
require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use SuperMarket\services\OfferService;

final class OfferServiceTest extends TestCase
{
    private $offerService;

    protected function setUp(): void
    {
        $this->offerService = new OfferService();
    }

    //Offer 1
    public function testWithoutOfferReturnCorrectTotal() {
        $data = [
            (object) [
                'id' => 1,
                'product_id' => 1,
                'quantity' => 2,
            ]
        ];

        //In framework like laravel , we will us DI
        $total = $this->offerService->total($data);
        $this->assertEquals(100, $total);
    }

    public function testWithOfferReturnCorrectTotal() {
        $data = [
            (object) [
                'id' => 1,
                'product_id' => 1,
                'quantity' => 4,
            ]
        ];

        //In framework like laravel , we will us DI
        $total = $this->offerService->total($data);
        $this->assertEquals(180, $total);
    }

    public function testWithAndWithoutOfferReturnCorrectTotal() {
        $data = [
            (object) [
                'id' => 1,
                'product_id' => 1,
                'quantity' => 5,
            ]
        ];

        //In framework like laravel , we will us DI
        $total = $this->offerService->total($data);
        $this->assertEquals(230, $total);
    }

    //Offer 2
    public function testOffer2ReturnCorrectTotal() {
        $data = [
            (object) [
                'id' => 1,
                'product_id' => 3,
                'quantity' => 3,
            ]
        ];

        //In framework like laravel , we will us DI
        $total = $this->offerService->total($data);
        $this->assertEquals(38, $total);
    }

}