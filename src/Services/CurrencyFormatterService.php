<?php

require_once './src/Entities/ProductEntity.php';
class CurrencyFormatter
{
    public static function getCurrency(float $price, string $locale, string $currency): string
    {
        if (
            ($locale === 'en-GB' || $locale === 'en-US' || $locale === 'ja-JP' || $locale === 'en-EU')
            && ($currency === 'GBP' || $currency === 'USD' || $currency === 'EUR' || $currency === 'JPY')
        ){
            $fmt = numfmt_create($locale, NumberFormatter::CURRENCY);
            if ($price >= 0) {
                return numfmt_format_currency($fmt, $price, $currency);
            }
            else{
                return numfmt_format_currency($fmt, 0.00, $currency);
            }
        }
        else{
            throw new Exception('An error has occurred');
        }
    }
}