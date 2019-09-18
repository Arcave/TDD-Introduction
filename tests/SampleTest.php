<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testItWorksReturnsTrue()
    {
        $sample = new Sample();

        $this->assertTrue($sample->itWorks());
    }

    /**
     * @test
     */
    public function itWorksReturnsTrue()
    {
        $sample = new Sample();

        $this->assertTrue($sample->itWorks());
    }
}
