<?php
declare(strict_types=1);

namespace Katas\WordWrap;

/**
 * @see https://www.codewars.com/kata/word-wrap-1
 */
class WordWrapper
{
    public function wrap(string $input, int $limit): string
    {
        $words = $this->createWords($input);
        $lines = new Lines($limit);

        foreach ($words as $word) {
            $lines->accept($word);
        }

        return (string)$lines;
    }

    /**
     * @return Word[]
     */
    private function createWords(string $input): array
    {
        return array_map(function (string $word) {
            return new Word($word);
        }, explode(' ', $input));
    }
}
