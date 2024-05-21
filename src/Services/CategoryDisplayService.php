
<?php

require_once 'src/Entities/Category.php';

class CategoryDisplayService
{
    public static function displayByCategory(Category $category): string
    {

            return '<div class="flex justify-between items-center bg-slate-100 p-5">
            <h3 class="text-2xl">' . $category->getCategoryName() . '</h3>
            <span class="bg-teal-500 text-2xl px-2 py-1 rounded">' . $category->getCategoryStock() . '</span>
            </div>';
        }
}