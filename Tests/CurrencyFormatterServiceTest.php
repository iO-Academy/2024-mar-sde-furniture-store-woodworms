<?php

require_once 'src/Services/CurrencyFormatterService.php';
use PHPUnit\Framework\TestCase;

class CurrencyFormatterServiceTest extends TestCase
{
    public function testGetCurrencySuccess()
    {
        $result = CurrencyFormatter::getCurrency(30.5, 'en-GB', 'GBP');
        $expectedResult = '£30.50';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessInt()
    {
        $result = CurrencyFormatter::getCurrency(440, 'en-GB', 'GBP');
        $expectedResult = '£440.00';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessFloat()
    {
        $result = CurrencyFormatter::getCurrency(30.5957234, 'en-GB', 'GBP');
        $expectedResult = '£30.60';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessNegative()
    {
        $result = CurrencyFormatter::getCurrency(-30.5, 'en-GB', 'GBP');
        $expectedResult = '£0.00';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessUSD()
    {
        $result = CurrencyFormatter::getCurrency(54.30, 'en-US', 'USD');
        $expectedResult = '$54.30';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencySuccessYEN()
    {
        $result = CurrencyFormatter::getCurrency(54.36, 'ja-JP', 'JPY');
        $expectedResult = '￥54';
        $this->assertSame($expectedResult, $result);
    }

    public function testGetCurrencyMalformed()
    {
        $this->expectException(TypeError::class);
        CurrencyFormatter::getCurrency('thirtyfive', 'en-GB', 'GBP');
    }

    public function testGetCurrencyMalformedLocale()
    {
        $this->expectException(TypeError::class);
        CurrencyFormatter::getCurrency(13.4, [], 'GBP');
    }

    public function testGetCurrencyMalformedCurrency()
    {
        $this->expectException(TypeError::class);
        CurrencyFormatter::getCurrency(13.4, 'en-GB', []);
    }

    public function testGetCurrencyFailureLocale()
    {
        $this->expectException(Exception::class);
        CurrencyFormatter::getCurrency(13.4, 'oihosef', 'GBP');
    }

    public function testGetCurrencyFailureCurrency()
    {
        $this->expectException(Exception::class);
        CurrencyFormatter::getCurrency(13.4, 'en-US', '98d');
    }

}