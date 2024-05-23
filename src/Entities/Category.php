<?php
class Category
{
    private int $id;
    private string $name;
    private int $total_stock;

    public function getCategoryName() : string
    {
        return $this->name;
    }

    public function getCategoryStock(): int
    {
        return $this->total_stock;
    }

    public function getCategoryId(): int
    {
        return $this->id;
    }

}

