<?php

require_once 'src/Services/CategoryDisplayService.php';
use PHPUnit\Framework\TestCase;

class CategoryDisplayServiceTest extends TestCase
{
    public function testDisplayByCategoryMock()
    {
        $categoryMock = $this->createMock(Category::class);
        $categoryMock->method('getCategoryName')->willReturn('Fridge');
        $categoryMock->method('getCategoryStock')->willReturn(100);
        $categoryMock->method('getCategoryId')->willReturn(5);
        $result = CategoryDisplayService::displayByCategory($categoryMock);
        $expectedResult = '<div class="bg-slate-100 p-5">
            <div class="flex justify-between items-center">
            <h3 class="text-2xl">Fridge</h3>
            <span class="bg-teal-500 text-2xl px-2 py-1 rounded">100</span>
            </div>
            <a href="products.php?cat_id=5" class="inline-block bg-blue-600 px-3 py-2 rounded text-white">More >></a>
            </div>';
        $this->assertSame($expectedResult, $result);
    }

    public function testDisplayByCategoryMalformed()
    {
        $this->expectException(TypeError::class);
        CategoryDisplayService::displayByCategory(5);
    }
}