<?php

require_once 'src/Entities/ProductEntity.php';

class IndividualProductDisplayService
{
    public static function displayProductDetails (ProductEntity $productInfo): string
    {
        return
            '<div class="flex justify-between items-start">
              <h1 class="text-5xl">' . $productInfo->getProductColor() . '-' . $productInfo->getProductPrice() . '</h1>
              <span class="bg-teal-500 px-2 rounded">Stock: 3</span>
    </div>
    <h2 class="text-3xl mt-3">Dimensions</h2>
    <p class="mt-2">Width: ' . $productInfo->getProductWidth() . '</p>
    <p class="mt-3">Height: ' . $productInfo->getProductHeight() . '</p>
    <p class="mt-3">Depth: ' . $productInfo->getProductDepth() . '</p>';
    }



}