
<?php

require_once 'src/Entities/Category.php';
class CategoryDisplayService
{
    public static function displayCategorySummary(Category $category): string
    {
            return '<div class="bg-slate-100 p-5">
            <div class="flex justify-between items-center">
            <h3 class="text-2xl">' . $category->getCategoryName() . '</h3>
            <span class="bg-teal-500 text-2xl px-2 py-1 rounded">' . $category->getCategoryStock() . '</span>
            </div>
            <a href="products.php?category_id=' . $category->getCategoryId() . '" class="inline-block bg-blue-600 px-3 py-2 rounded text-white">More >></a>
            </div>';
        }
}