
<?php

require_once 'src/Entities/Category.php';

class CategoryDisplayService
{
    public static function displayByCategory($category): string
    {
        if (!is_int($category->total_stock) || !is_string($category->name)) {
            throw new TypeError('Invalid Type');
        }
        else if ($category->total_stock < 0){
            throw new Exception('Total stock can\'t be less than 0');
        }
        else{
            return '<div class="flex justify-between items-center bg-slate-100 p-5">
            <h3 class="text-2xl">' . $category->name . '</h3>
            <span class="bg-teal-500 text-2xl px-2 py-1 rounded">' . $category->total_stock . '</span>
            </div>';
        }
    }
}