<?php
declare(strict_types=1);

namespace Katas\DuplicatesCounter;

/**
 * @see https://www.codewars.com/kata/54bf1c2cd5b56cc47f0007a1
 */
class DuplicatesCounter
{
    public function count(string $input): int
    {
        $chars = str_split($input);
        $duplicates = [];

        foreach ($chars as $char) {
            $lowerCaseChar = strtolower($char);
            isset($duplicates[$lowerCaseChar])
                ? $duplicates[$lowerCaseChar]++
                : $duplicates[$lowerCaseChar] = 1;
        }

        return array_reduce($duplicates, function (int $carry, int $duplicationsCount) {
            return $duplicationsCount > 1
                ? $carry + 1
                : $carry;
        }, 0);
    }
}
