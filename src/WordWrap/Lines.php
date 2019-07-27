<?php
declare(strict_types=1);

namespace Katas\WordWrap;

use Closure;

class Lines
{
    /**
     * @var Line[]
     */
    private $lines;

    /**
     * @var int
     */
    private $limit;

    public function __construct(int $limit)
    {
        $this->lines = [new Line($limit)];
        $this->limit = $limit;
    }

    public function __toString(): string
    {
        /** @var string $result */
        $result = array_reduce($this->lines, function (string $carry, Line $line) {
            $result = $carry . (string)$line;

            return $this->isLast($line)
                ? $result
                : $result . PHP_EOL;
        }, '');

        return $result;
    }

    public function accept(Word $word)
    {
        $lastLine = $this->getLast();

        $lastLine->accept($word, Closure::fromCallable([$this, 'addWordToNewLine']));
    }

    private function addWordToNewLine(Word $word) {
        $this->addLine();
        $this->getLast()->accept($word, Closure::fromCallable([$this, 'addWordToNewLine']));
    }

    private function isLast(Line $line): bool
    {
        return $line === $this->getLast();
    }

    private function getLast(): Line
    {
        return $this->lines[count($this->lines) - 1];
    }

    private function addLine(): void
    {
        $this->lines[] = new Line($this->limit);
    }
}
