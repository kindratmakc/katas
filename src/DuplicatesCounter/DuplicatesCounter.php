<?php
declare(strict_types=1);

namespace Katas\DuplicatesCounter;

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
