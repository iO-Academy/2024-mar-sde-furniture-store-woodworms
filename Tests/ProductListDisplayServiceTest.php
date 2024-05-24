<?php

require_once 'src/Services/ProductListDisplayService.php';
use PHPUnit\Framework\TestCase;

class ProductListDisplayServiceTest extends TestCase
{
    public function testDisplayCategoryTitle_Success()
    {
        $result = ProductListDisplayService::displayCategoryTitle('Chairs');
        $expectedResult =
        '<header class="container mx-auto md:w-full md:mt-10 my-4 py-16 px-8 bg-slate-200 rounded">
        <h1 class="text-5xl mb-2">Category: Chairs</h1>
        <p>For more information about any of the below products, click on the more button.</p>
        </header>';
        $this->assertSame($expectedResult, $result);
    }

    public function testDisplayProductList_Success()
    {
        $productListMock = $this->createMock(Product::class);
        $productListMock->method('getProductPrice')->willReturn('£10.99');
        $productListMock->method('getProductStock')->willReturn(111);
        $productListMock->method('getProductColor')->willReturn('Green');
        $result = ProductListDisplayService::displayProductSummary($productListMock);
        $expectedResult ='
          <div class="bg-slate-100 p-5">
          <div class="flex justify-between items-center">
          <h3 class="text-2xl">Price: £10.99</h3>
          <span class="bg-teal-500 text-2xl px-2 py-1 rounded">111</span>
          </div>
          <p>Color: Green</p>
          </div>';
        $this->assertSame($expectedResult, $result);
    }

    public function testDisplayCategoryTitle_Malformed()
    {
        $this->expectException(TypeError::class);
        ProductListDisplayService::displayCategoryTitle([]);
    }

    public function testDisplayProductList_Malformed()
    {
        $this->expectException(TypeError::class);
        ProductListDisplayService::displayProductSummary(5);
    }

}