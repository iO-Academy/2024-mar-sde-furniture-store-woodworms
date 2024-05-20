<?php

require_once 'src/Entities/Category.php';

class CategoryDisplayService
{
    public static function displayByCategory($name, $total_stock)
    {
        echo '<div class="flex justify-between items-center bg-slate-100 p-5">';
        echo '<h3 class="text-2xl">' . $name . '</h3>';
        echo '<span class="bg-teal-500 text-2xl px-2 py-1 rounded">' . $total_stock . '</span>';
        echo '</div>';
    }

}