<?php
declare(strict_types=1);

namespace Katas\FizzBuzz;

class FizzBuzz
{
    public function of(int $number): string
    {
        if ($this->isDivisibleByThreeAndFive($number)) {
            return 'fizzbuzz';
        } else if ($this->isDivisibleByThree($number)) {
            return 'fizz';
        } else if ($this->isDivisibleByFive($number)) {
            return 'buzz';
        }

        return (string)$number;
    }

    private function isDivisibleByThree(int $number): bool
    {
        return $number % 3 === 0;
    }

    private function isDivisibleByFive(int $number): bool
    {
        return $number % 5 === 0;
    }

    private function isDivisibleByThreeAndFive(int $number): bool
    {
        return $this->isDivisibleByThree($number) && $this->isDivisibleByFive($number);
}
}
