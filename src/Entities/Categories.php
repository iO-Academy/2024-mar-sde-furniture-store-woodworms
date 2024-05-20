<?php

require_once 'src/Models/ProductsModel.php';
require_once 'src/Entities/Products.php';



Class Categories{
    private int $id;
    private string $name;

    public function displayByCategory(){
        echo '<h3 class="text-2xl">' . $this->name . '</h3>';
    }



}

