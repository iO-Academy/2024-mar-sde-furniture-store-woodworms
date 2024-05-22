<?php
class Category
{
    private int $id;
    private string $name;
    private int $total_stock;
    public function getCategoryName()
    {
        return $this->name;
    }
    public function getCategoryStock()
    {
        return $this->total_stock;
    }

    public function getCategoryId()
    {
        return $this->id;
    }

}

