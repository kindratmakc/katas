<?php
declare(strict_types=1);

namespace FizzBuzz;

class FizzBuzz
{
    public function of(int $number): string
    {
        if ($this->isDivisableByThreeAndFive($number)) {
            return 'Fizz Bazz';
        } else if ($this->isDivisableByThree($number)) {
            return 'Fizz';
        } else if ($this->isDivisableByFive($number)) {
            return 'Bazz';
        }

        return (string)$number;
    }

    private function isDivisableByThree(int $number): bool
    {
        return $number % 3 === 0;
    }

    private function isDivisableByFive(int $number): bool
    {
        return $number % 5 === 0;
    }

    private function isDivisableByThreeAndFive(int $number): bool
    {
        return $this->isDivisableByThree($number) && $this->isDivisableByFive($number);
}
}
