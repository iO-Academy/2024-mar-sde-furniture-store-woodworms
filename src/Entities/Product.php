<?php

require_once 'src/Services/CurrencyFormatterService.php';

class Product
{
    private string $color;

    private int $stock;

    private float $price;

    private string $name;

    private int $id;

    public function getProductId() : int
    {
        return $this->id;
    }
    public function getCategoryName() : string
    {
        return $this->name;
    }

    public function getProductPrice() : string
    {
        return CurrencyFormatter::getCurrency($this->price, 'en-GB', "GBP");
    }
    public function getProductStock() : int
    {
        return $this->stock;
    }

    public function getProductColor() : string
    {
        return $this->color;
    }

}


