<?php
namespace Test\Chapter\One;

use App\Chapter\One\Dollar;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class MoneyTest extends TestCase
{

     public function testMultiplication()
    {
        $five = new Dollar(5);
        $five->times(2);
        //assertEqualsは==のため、assertSame(===)の方が方まで見れて良い。
        $this->assertSame(10, $five->amount);
    }
}