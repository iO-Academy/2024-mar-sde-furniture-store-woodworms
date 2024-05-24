<?php

require_once 'src/Services/CurrencyFormatterService.php';
use PHPUnit\Framework\TestCase;

class CurrencyFormatterServiceTest extends TestCase
{
    public function testGetCurrencySuccess()
    {
        $result = CurrencyFormatter::getCurrency(30.5, CurrencyFormatter::GBP);
        $expectedResult = '£30.50';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessInt()
    {
        $result = CurrencyFormatter::getCurrency(440, CurrencyFormatter::GBP);
        $expectedResult = '£440.00';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessFloat()
    {
        $result = CurrencyFormatter::getCurrency(30.5957234, CurrencyFormatter::GBP);
        $expectedResult = '£30.60';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessUSD()
    {
        $result = CurrencyFormatter::getCurrency(54.30, CurrencyFormatter::USD);
        $expectedResult = '$54.30';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessYEN()
    {
        $result = CurrencyFormatter::getCurrency(54.36, CurrencyFormatter::JPY);
        $expectedResult = '￥54';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencyMalformed()
    {
        $this->expectException(TypeError::class);
        CurrencyFormatter::getCurrency('thirtyfive', CurrencyFormatter::GBP);
    }

    public function testGetCurrencyMalformedCurrency()
    {
        $this->expectException(TypeError::class);
        CurrencyFormatter::getCurrency(13.4, []);
    }

    public function testGetCurrencySuccessCurrency()
    {
        $result = CurrencyFormatter::getCurrency(13.4, 'jtfjyt');
        $expectedResult = '--.--';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencyFailureNegative()
    {
        $this->expectException(Exception::class);
        CurrencyFormatter::getCurrency(-30.5, CurrencyFormatter::GBP);
    }

}