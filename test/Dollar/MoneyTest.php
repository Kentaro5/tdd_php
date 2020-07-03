<?php
namespace Test\Dollar;

use App\Dollar\Dollar;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class MoneyTest extends TestCase
{

    public function testMultiplication()
    {
        $five = new Dollar(5);
        $product = $five->times(2);
        //assertEqualsは==のため、assertSame(===)の方が方まで見れて良い。
        $this->assertSame(10, $product->amount);
        $product = $five->times(3);
        $this->assertSame(15, $product->amount);
    }

    public function testEquality()
    {
        $dollar = new Dollar(5);
        $this->assertTrue( $dollar->equals( new Dollar(5) ) );
        $this->assertFalse( $dollar->equals( new Dollar(6) ) );
    }
}