<?php

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
        return $this->price;
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


