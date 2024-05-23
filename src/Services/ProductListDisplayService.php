
<?php

require_once 'src/Entities/ProductEntity.php';

class ProductListDisplayService
{
    public static function displayCategoryTitle(string $categoryTitle): string
    {
        return '<header class="container mx-auto md:w-full md:mt-10 my-4 py-16 px-8 bg-slate-200 rounded">
        <h1 class="text-5xl mb-2">Category: ' . $categoryTitle . '</h1>
        <p>For more information about any of the below products, click on the more button.</p>
        </header>';
    }

    public static function displayProductSummary(ProductEntity $product): string
    {
        return '
          <div class="bg-slate-100 p-5">
          <div class="flex justify-between items-center">
          <h3 class="text-2xl">Price: '. $product->getProductPrice() .'</h3>
          <span class="bg-teal-500 text-2xl px-2 py-1 rounded">'. $product->getProductStock() .'</span>
          </div>
          <p>Color: '. $product->getProductColor() .'</p>
          <a href="product.php?id= '. $product->getProductId() . '"class="inline-block bg-blue-600 px-3 py-2 rounded text-white mt-1">More >></a>
          </div>';
    }

}