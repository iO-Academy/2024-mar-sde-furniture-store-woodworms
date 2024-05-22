<?php

require_once 'src/Services/CurrencyDisplayService.php';

class Product
{
    private string $color;

    private int $stock;

    private float $price;

    private string $name;

    private int $id;

    public function getProductId()
    {
        return $this->id;
    }
    public function getCategoryName()
    {
        return $this->name;
    }

    public function getProductPrice()
    {
        return CurrencyDisplayService::getCurrency($this->price, 'en-GB', "GBP");
    }
    public function getProductStock()
    {
        return $this->stock;
    }

    public function getProductColor()
    {
        return $this->color;
    }

}


