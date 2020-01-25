<?php

use App\Service\countDeveloperPrice;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class countDeveloperPriceTest extends WebTestCase
{
    /**
     * @dataProvider experiencePoints
     */
    public function testReturnPrice($experience, $expectedPrice)
    {
        $price = new countDeveloperPrice();
        $this->assertSame($expectedPrice, $price->returnPrice($experience));
    }

    public function experiencePoints()
    {
        return [
            [1, "10 euros / heure"], 
            [2, "15 euros / heure"], 
            [3, "20 euros / heure"], 
            [4, "30 euros / heure"],
            [5, "40 euros / heure"]
        ];
    } 

    public function testReturnPriceException()
    {
        $price = new countDeveloperPrice();
        $this->expectException('Exception');
        $price->returnPrice(null);
    }
}