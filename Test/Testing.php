<?php

namespace Test;

use PHPUnit\Framework\TestCase;

class Testing extends TestCase
{
    /**
     * @test
     * 
     */
    public function failure()
    {

        $this->assertEquals(1, 1);
    }

    public function testFailure2()
    {
        $this->assertEquals('bar', 'bar');
    }
}
///https://www.youtube.com/watch?v=pZv93AEJhS8