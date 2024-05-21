<?php

require_once 'src/Services/CategoryDisplayService.php';
use PHPUnit\Framework\TestCase;

class CategoryDisplayTest extends TestCase
{
    public function testDisplayByCategoryMock()
    {
        $categoryMock = $this->createMock(Category::class);
        $categoryMock->method('getCategoryName')->willReturn('Fridge');
        $categoryMock->method('getCategoryStock')->willReturn(100);
        $result = CategoryDisplayService::displayByCategory($categoryMock);
        $expectedResult = '<div class="flex justify-between items-center bg-slate-100 p-5">
            <h3 class="text-2xl">Fridge</h3>
            <span class="bg-teal-500 text-2xl px-2 py-1 rounded">100</span>
            </div>';
        $this->assertSame($expectedResult, $result);
    }

    public function testDisplayByCategoryMalformed()
    {
        $this->expectException(TypeError::class);
        CategoryDisplayService::displayByCategory(5);
    }
}