<?php
namespace Test\Dollar;

use App\Common\Money\Money;
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
        //Javaでやってみたが、Dollarクラスが返ってきていた。
        $five = Money::Dollar(5);

        //assertEqualsは==のため、値の比較などの場合はassertSame(===)の方が方まで見れて良い。
        //assertEqualsは同じクラス、同じ属性値かどうかをチェックする。。
        $this->assertTrue($five->times(2)->equals(Money::Dollar(10)));
        $this->assertTrue($five->times(3)->equals(Money::Dollar(15)));
    }

    public function testEquality()
    {
        $dollar = Money::Dollar(5);
        $this->assertTrue( $dollar->equals(  Money::Dollar(5) ) );
        $this->assertFalse( $dollar->equals(  Money::Dollar(6) ) );

        $franc = Money::Franc(5);
        $this->assertTrue( $franc->equals( Money::Franc(5) ) );
        $this->assertFalse( $franc->equals( Money::Franc(6) ) );

        //FrancとDollarを比較
        $this->assertFalse( $franc->equals(  Money::Dollar(5) ) );
    }

    public function testFrancMultiplication()
    {
        $five = Money::Franc(5);

        $this->assertTrue($five->times(2)->equals(Money::Franc(10)));
        $this->assertTrue($five->times(3)->equals(Money::Franc(15)));
    }

    public function testCurrency()
    {
        $franc = Money::Franc(1);
        $dollar = Money::Dollar(1);

        $this->assertEquals('USD', $dollar->currency());
        $this->assertEquals('CHF', $franc->currency());
    }

    public function testDifferentClassEquality()
    {
        $money = new Money(10, 'CHF');
        $this->assertTrue($money->equals( new Franc(10, 'CHF') ));
    }

}