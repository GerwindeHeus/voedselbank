<?php

require 'vendor/autoload.php';

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class LandingpagesTest extends TestCase
{
    public static function additionProvider()
    {
        return [
            [0, 0, 0],
            [0, 1, 1],
            [1, 0, 1],
            [1, 1, 2],
        ];
    }

 
    #[DataProvider('additionProvider')]
    public function testAdd($number1, $number2, $expected)
    {
        $landingpagesTest = new Landingpages();
        

        $output = $landingpagesTest->add($number1, $number2);

        $this->assertEquals($expected, $output);
    }
}