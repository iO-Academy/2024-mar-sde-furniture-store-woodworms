<?php

require_once 'src/Services/CategoryDisplayService.php';
use PHPUnit\Framework\TestCase;

class CategoryDisplayTest extends TestCase
{
    public function testDisplayByCategoryMock()
    {
        $categoryMock = $this->createMock(Category::class);
        $categoryMock->name='Fridge';
        $categoryMock->total_stock=100;
        $result = CategoryDisplayService::displayByCategory($categoryMock);
        $expectedResult = '<div class="flex justify-between items-center bg-slate-100 p-5">
            <h3 class="text-2xl">Fridge</h3>
            <span class="bg-teal-500 text-2xl px-2 py-1 rounded">100</span>
            </div>';
        $this->assertSame($expectedResult, $result);
    }

    public function testDisplayByCategoryFailure()
    {
        $categoryMock = $this->createMock(Category::class);
        $categoryMock->name='Fridge';
        $categoryMock->total_stock=-10;
        $this->expectException(Exception::class);
        CategoryDisplayService::displayByCategory($categoryMock);
    }

    public function testDisplayByCategoryMalformed()
    {
        $categoryMock = $this->createMock(Category::class);
        $categoryMock->name=10;
        $categoryMock->total_stock='Fridge';
        $this->expectException(TypeError::class);
        CategoryDisplayService::displayByCategory($categoryMock);
    }
}