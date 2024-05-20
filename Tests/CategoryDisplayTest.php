<?php

require_once '../src/Services/CategoryDisplayService.php';

use PHPUnit\Framework\TestCase;

class CategoryDisplayTest extends TestCase {

    public function testDisplayByCategory() // success
    {
        $result = displayByCategory('chair', '45');
        $this->assertSame('chair', ' 45', $result);
    }

//    public function testCalculateAreaOfCircleNegative() // failure
//    {
//        $this->expectException(Exception::class);
//        calculateAreaOfCircle(-5);
//    }
//    public function testCalculateAreaOfCircleWrongDataType() // malformed
//    {
//        $this->expectException(TypeError::class);
//        calculateAreaOfCircle('Mike');
//
//    }
}