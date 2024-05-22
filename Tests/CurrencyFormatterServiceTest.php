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

    public function testGetCurrencyMalformed()
    {
        $this->expectException(TypeError::class);
        CurrencyFormatter::getCurrency('thirtyfive', 'en-GB', 'GBP');
    }
}

