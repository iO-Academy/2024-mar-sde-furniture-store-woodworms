<?php

Class Categories{
    private int $id;
    private string $name;
    private int $total_stock;

    public function displayByCategory(){
        echo '<h3 class="text-2xl">' . $this->name . '</h3>';
        echo '<span class="bg-teal-500 text-2xl px-2 py-1 rounded">' . $this->total_stock . '</span>';
    }


}

