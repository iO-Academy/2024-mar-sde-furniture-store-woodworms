<?php

require_once 'src/Services/CurrencyFormatterService.php';

class ProductEntity
{
    private string $color;
    private int $stock;
    private float $price;
    private string $name;
    private int $id;
    private int $depth;
    private int $width;
    private int $height;

    private int $related;


    public function getProductId(): int
    {
        return $this->id;
    }

    public function getCategoryName(): string
    {
        return $this->name;
    }

    public function getProductPrice(): string
    {
        return CurrencyFormatter::getCurrency($this->price, 'en-GB', "GBP");
    }

    public function getProductStock(): int
    {
        return $this->stock;
    }

    public function getProductColor(): string
    {
        return $this->color;
    }

    public function getProductWidth(): int
    {
        return $this->width;
    }

    public function getProductDepth(): int
    {
        return $this->depth;
    }

    public function getProductHeight(): int
    {
        return $this->height;
    }

    public function getRelatedId(): int
    {
        return $this->related;
    }

}