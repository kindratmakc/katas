<?php

namespace Katas\Tests\DuplicatesCounter;

use Katas\DuplicatesCounter\DuplicatesCounter;
use PHPUnit\Framework\TestCase;

class DuplicatesCounterTest extends TestCase
{
    /** @var DuplicatesCounter */
    private $counter;

    protected function setUp()
    {
        $this->counter = new DuplicatesCounter();
    }

    public function testNoDuplicates()
    {
        $this->assertSame(0, $this->counter->count('abcde'));
    }

    public function testOneDuplicate()
    {
        $this->assertSame(1, $this->counter->count('alphabet'));
    }

    public function testTwoDuplicates()
    {
        $this->assertSame(2, $this->counter->count('aabccc'));
    }

    public function testCaseInsensitive()
    {
        $this->assertSame(2, $this->counter->count('Dd232'));
    }
}
