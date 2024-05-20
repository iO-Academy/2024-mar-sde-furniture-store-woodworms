<?php

class Products{

    private int $id;
    private int $cat_id;
    private int $width;
    private int $height;
    private int $depth;
    private float $price;
    private int $stock;
    private int $related;
    private string $color;

    public function displayStock(){
        return '<span class="bg-teal-500 text-2xl px-2 py-1 rounded">' . $this->stock . '</span>';
    }

    public function getStock(){
        return $this->stock;
    }

}