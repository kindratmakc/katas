<?php
declare(strict_types=1);

namespace FizzBuzz\Tests;

use FizzBuzz\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    const FIZZ = 'Fizz';
    const BAZZ = 'Bazz';
    const FIZZBUZZ = self::FIZZ . ' ' . self::BAZZ;

    private $fizzBuzz;

    protected function setUp()
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    public function testOfOneIsOne()
    {
        $this->assertEquals('1', $this->fizzBuzz->of(1));
    }

    public function testOfThreeIsFizz()
    {
        $this->assertEquals(self::FIZZ, $this->fizzBuzz->of(3));
    }

    public function testOfFiveIsBuzz()
    {
        $this->assertEquals(self::BAZZ, $this->fizzBuzz->of(5));
    }

    public function testOfSixIsFizz()
    {
        $this->assertEquals(self::FIZZ, $this->fizzBuzz->of(6));
    }

    public function testOfTenIsBuzz()
    {
        $this->assertEquals(self::BAZZ, $this->fizzBuzz->of(10));
    }

    public function testOfFifteenIsFizzBuzz()
    {
        $this->assertEquals(self::FIZZBUZZ, $this->fizzBuzz->of(15));
    }

    public function testOfThirteenIsFizzBuzz()
    {
        $this->assertEquals(self::FIZZBUZZ, $this->fizzBuzz->of(30));
    }
}
