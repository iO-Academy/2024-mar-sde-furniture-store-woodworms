<?php

require_once './src/Entities/Product.php';
class CurrencyFormatter
{
    public static function getCurrency(float $price, string $locale, string $currency):string
    {
        $fmt = numfmt_create($locale, NumberFormatter::CURRENCY);
        return numfmt_format_currency($fmt, $price, $currency);
    }
}