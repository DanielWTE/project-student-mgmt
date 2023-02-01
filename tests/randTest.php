<?php

use PHPUnit\Framework\TestCase;

class randTest extends TestCase
{
    public function testAddition()
    {
        $this->assertEquals(2, 1 + 1);
    }

    public function testAdditionWrong()
    {
        $this->assertEquals(2, 4 + 1);
    }
}

?>