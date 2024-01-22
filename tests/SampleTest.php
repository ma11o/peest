<?php
//use peest\Framework\TestCase;
use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function test()
    {
        $val = 1 + 1;
        return $this->assertSame(3, $val);
    }

    public function test1()
    {
        $val = 1;
        $this->assertSame(2, $val);
    }
}