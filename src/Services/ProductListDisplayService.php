
<?php

require_once 'src/Entities/Product.php';

class ProductListDisplayService
{
    public static function displayCategoryTitle(string $categoryTitle): string
    {
        return '<header class="container mx-auto md:w-full md:mt-10 my-4 py-16 px-8 bg-slate-200 rounded">
        <h1 class="text-5xl mb-2">Category: ' . $categoryTitle . '</h1>
        <p>For more information about any of the below products, click on the more button.</p>
        </header>';
    }

    public static function displayProductSummary(Product $productsInfo): string
    {
        return '
          <div class="bg-slate-100 p-5">
          <div class="flex justify-between items-center">
          <h3 class="text-2xl">Price: '. $productsInfo->getProductPrice() .'</h3>
          <span class="bg-teal-500 text-2xl px-2 py-1 rounded">'. $productsInfo->getProductStock() .'</span>
          </div>
          <p>Color: '. $productsInfo->getProductColor() .'</p>
          </div>';
    }

}