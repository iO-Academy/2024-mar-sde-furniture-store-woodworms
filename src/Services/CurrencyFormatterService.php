<?php

require_once './src/Entities/Product.php';
class CurrencyFormatter
{
    private static array $currencies = [
        'GBP' => 'en-GB',
        'USD' => 'en-US',
        'EUR' => 'en-EU',
        'JPY' => 'ja-JP'
    ];
    public const GBP = 'GBP';
    public const USD = 'USD';
    public const EUR = 'EUR';
    public const JPY = 'JPY';

    public static function getCurrency(float $price, string $currency): string
    {
        if (isset(self::$currencies[$currency])){
            $fmt = numfmt_create(self::$currencies[$currency], NumberFormatter::CURRENCY);
            if ($price >= 0) {
                return numfmt_format_currency($fmt, $price, $currency);
            }
            else {
                return numfmt_format_currency($fmt, 0.00, $currency);
            }
        }
        else {
            throw new Exception('An error has occurred');
        }
    }
}