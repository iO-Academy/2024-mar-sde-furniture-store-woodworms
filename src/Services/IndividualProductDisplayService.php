<?php

require_once 'src/Entities/ProductEntity.php';

class IndividualProductDisplayService
{
    public static function displayProductDetails (ProductEntity $productInfo): string
    {
        return
            '<div class="flex justify-between items-start">
              <h1 class="text-5xl">' . $productInfo->getProductColor() . ' - ' . $productInfo->getProductPrice() . '</h1>
              <span class="bg-teal-500 px-2 rounded">Stock: 3</span>
    </div>
    <h2 class="text-3xl mt-3">Dimensions</h2>
    <p class="mt-2">Width: ' . $productInfo->getProductWidth() . 'mm</p>
    <p class="mt-3">Height: ' . $productInfo->getProductHeight() . 'mm</p>
    <p class="mt-3">Depth: ' . $productInfo->getProductDepth() . 'mm</p>';
    }

    public static function displayRelatedProductSummary (ProductEntity $productInfo): string
    {
        return
        '<h1 class="text-3xl border-b pb-3 mb-3">Similar Product</h1>
<div class="flex justify-between items-start">
<p class="text-2xl">' . $productInfo->getProductPrice() . '</p>
<span class="bg-teal-500 px-2 rounded">Stock: 16</span>
</div>
<div class="flex justify-between items-start">
<p>Color: ' . $productInfo->getProductColor() . '</p>
<a href="product.html" class="inline-block bg-blue-600 px-3 py-2 rounded text-white mt-1">More >></a>
</div>';
    }




}