<?php

namespace Katas\Tests\DirectionReducer;

use Katas\DirectionReducer\DirectionReducer;
use PHPUnit\Framework\TestCase;

class DirectionReducerTest extends TestCase
{
    const WEST = 'WEST';
    const SOUTH = 'SOUTH';
    const EAST = 'EAST';
    const NORTH = 'NORTH';

    /** @var DirectionReducer  */
    private $reducer;

    protected function setUp()
    {
        $this->reducer = new DirectionReducer();
    }

    public function testAroundTheWorld()
    {
        $this->assertSame([
            self::WEST,
            self::SOUTH,
            self::EAST,
            self::NORTH,
        ], $this->reducer->reduce([
            self::WEST,
            self::SOUTH,
            self::EAST,
            self::NORTH,
        ]));
    }

    public function testOppositeDirectionsDestroyed()
    {
        $this->assertSame([], $this->reducer->reduce([self::WEST, self::EAST]));
        $this->assertSame([], $this->reducer->reduce([self::EAST, self::WEST]));
        $this->assertSame([], $this->reducer->reduce([self::NORTH, self::SOUTH]));
        $this->assertSame([], $this->reducer->reduce([self::SOUTH, self::NORTH]));
    }

    public function testTwoOppositePairsDestroyed()
    {
        $this->assertSame([self::WEST], $this->reducer->reduce([self::WEST, self::EAST, self::WEST, self::NORTH, self::SOUTH]));
    }

    public function testDirectionsBecomesOppositeAfterPairBetweenDestroyed()
    {
        $this->assertSame([self::SOUTH], $this->reducer->reduce([self::SOUTH, self::WEST, self::NORTH, self::SOUTH, self::EAST]));
    }
}
