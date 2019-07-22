<?php
declare(strict_types=1);

namespace Katas\Tests\FizzBuzz;

use Katas\FizzBuzz\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    private const FIZZ = 'fizz';
    private const BUZZ = 'buzz';
    private const FIZZ_BUZZ = self::FIZZ . self::BUZZ;

    private $fizzBuzz;

    protected function setUp()
    {
        $this->fizzBuzz = new FizzBuzz();
    }

    public function testOfOneIsOne()
    {
        $this->assertSame('1', $this->fizzBuzz->of(1));
    }

    public function testOfThreeIsFizz()
    {
        $this->assertFizz(3);
    }

    public function testOfFiveIsBuzz()
    {
        $this->assertBuzz(5);
    }

    public function testOfSixIsFizz()
    {
        $this->assertFizz(6);
    }

    public function testOfTenIsBuzz()
    {
        $this->assertBuzz(10);
    }

    public function testOfFifteenIsFizzBuzz()
    {
        $this->assertFizzBuzz(15);
    }

    public function testOfThirteenIsFizzBuzz()
    {
        $this->assertFizzBuzz(30);
    }

    private function assertFizz(int $number): void
    {
        $this->assertSame(self::FIZZ, $this->fizzBuzz->of($number));
    }

    private function assertBuzz(int $number): void
    {
        $this->assertSame(self::BUZZ, $this->fizzBuzz->of($number));
    }

    private function assertFizzBuzz(int $number): void
    {
        $this->assertSame(self::FIZZ_BUZZ, $this->fizzBuzz->of($number));
    }
}
