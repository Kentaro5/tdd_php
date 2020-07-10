<?php
namespace Test\Dollar;

use App\Dollar\Dollar;
use App\Franc\Franc;
use PHPUnit\Framework\TestCase;

/**
 *
 */
class MoneyTest extends TestCase
{

    public function testMultiplication()
    {
        $five = new Dollar(5);
        //assertEqualsは==のため、値の比較などの場合はassertSame(===)の方が方まで見れて良い。
        //assertEqualsは属性値のみを見る。逆にassertSameは全く同じかどうかをチェックする。
        $this->assertEquals(new Dollar(10), $five->times(2));
        $this->assertEquals(new Dollar(15), $five->times(3));
    }

    public function testEquality()
    {
        $dollar = new Dollar(5);
        $this->assertTrue( $dollar->equals( new Dollar(5) ) );
        $this->assertFalse( $dollar->equals( new Dollar(6) ) );

        $franc = new Franc(5);
        $this->assertTrue( $franc->equals( new Franc(5) ) );
        $this->assertFalse( $franc->equals( new Franc(6) ) );

        //FrancとDollarを比較
        $this->assertFalse( $franc->equals( new Dollar(5) ) );
    }

    public function testFrancMultiplication()
    {
        $five = new Franc(5);

        $this->assertEquals(new Franc(10), $five->times(2));
        $this->assertEquals(new Franc(15), $five->times(3));
    }
}