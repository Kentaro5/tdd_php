<?php
namespace Test\Dollar;

use App\Common\Money\Money;
use App\Bank\Bank;
use App\Sum\Sum;
use App\Pair\Pair;
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

        //FrancとDollarを比較
        $this->assertFalse( $franc->equals(  Money::Dollar(5) ) );
    }

    public function testCurrency()
    {
        $franc = Money::Franc(1);
        $dollar = Money::Dollar(1);

        $this->assertEquals('USD', $dollar->currency());
        $this->assertEquals('CHF', $franc->currency());
    }

    //$5 + $5 = 10のテスト
    public function testDimpleAddition()
    {
        $five = Money::Dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');

        $this->assertEquals(Money::Dollar(10), $reduced);
    }

    //plusメソッドがSumのインスタンスを返すかチェックするテスト
    public function testPlusReturnsSum()
    {
        $five = Money::Dollar(5);
        $sum =  $five->plus($five);

        $this->assertSame($five->amount(), $sum->augend->amount());
        $this->assertSame($five->amount(), $sum->addend->amount());
    }

    //足し算の結果を各通貨に置き換えると同じ金額になるかみるテスト。
    public function testReduceSum()
    {
        $sum = new Sum(Money::Dollar(3), Money::Dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, 'USD');
        $seven = Money::Dollar(7);

        $this->assertTrue( $seven->equals( $result ) );
    }

    //Bankに渡すreduceがExpressionではなく、Moneyインスタンスの場合のテスト
    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::Dollar(1), 'USD');
        $dollar = Money::Dollar(1);
        $this->assertTrue($dollar->equals($result));
    }

    //同じ為替レートで正しい数値が返ってくるかテスト
    public function testIdentityRate()
    {
        $bank = new Bank();
        $this->assertSame(1, $bank->rate('USD', 'USD'));
    }

    //違う通貨の結果を比較するテスト
    public function testReduceMoneyDifferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $result = $bank->reduce(Money::Franc(2), 'USD');
        $one = Money::Dollar(1);
        $this->assertTrue( $one->equals( $result ) );
    }

    //違う通貨を足し算した時に正しいふるまいになるかチェックするテスト
    public function testMixedAddition()
    {
        $fiveBucks = Money::Dollar(5);
        $tenFrancs = Money::Franc(10);

        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        $result = $bank->reduce($fiveBucks->plus($tenFrancs), 'USD');

        $this->assertTrue($result->equals(Money::Dollar(10)));
    }

    //通貨を加えていき、更に後から通過を加えた場合に正しい値になっているかチェックするテスト。
    public function testSumPlusMoney()
    {
        $fiveBucks = Money::Dollar(5);
        $tenFrancs = Money::Franc(10);

        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        $sum = new Sum($fiveBucks, $tenFrancs);

        $sum = $sum->plus($fiveBucks);
        $result = $bank->reduce($sum, 'USD');

        $fifteen = Money::Dollar(15);
        $this->assertTrue( $fifteen->equals($result) );
    }

    //掛け算のテスト。
    public function testSumTimes()
    {
        $fiveBucks = Money::Dollar(5);
        $tenFrancs = Money::Franc(10);

        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        $sum = new Sum($fiveBucks, $tenFrancs);

        $sum = $sum->times(2);
        $result = $bank->reduce($sum, 'USD');

        $twenty = Money::Dollar(20);
        $this->assertTrue( $twenty->equals($result) );

    }


}