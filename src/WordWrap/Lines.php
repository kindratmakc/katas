<?php
declare(strict_types=1);

namespace Katas\WordWrap;

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
        $this->lines = [
            new Line($limit),
        ];
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
        if ($this->isLastLineFull()) {
            $this->addLine();
        }

        $lastLine = $this->getLast();

        if ($lastLine->canAccept($word)) {
            $lastLine->add($word);
        } elseif (!$word->exceeds($this->limit)) {
            $this->addLine();
            $this->accept($word);
        } elseif (!$lastLine->isFull()) {
            list($leftPart, $rightPart) = $word->split($lastLine->spaceLeft());
            $lastLine->add($leftPart);
            $this->accept($rightPart);
        }
    }

    private function isLastLineFull(): bool
    {
        return $this->getLast()->isFull();
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
