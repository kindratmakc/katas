<?php
declare(strict_types=1);

namespace Katas\WordWrap;

class Line
{
    /**
     * @var int
     */
    private $limit;

    /**
     * @var string
     */
    private $content = '';

    public function __construct(int $limit)
    {
        $this->limit = $limit;
    }

    public function __toString()
    {
        return $this->content;
    }

    public function accept(Word $word, callable $onCantAdd): void
    {
        if ($word->fitsIn($this->spaceLeft())) {
            $this->addWord($word);
        } elseif ($this->isFull() || $word->fitsIn($this->limit)) {
            $onCantAdd($word);
        } else {
            list($leftPart, $rightPart) = $word->split($this->spaceLeft());
            $this->addWord($leftPart);
            $onCantAdd($rightPart);
        }
    }

    private function addWord(Word $word): void
    {
        $wordContent = (string)$word;
        if ($this->isEmpty()) {
            $this->content = $wordContent;
        } else {
            $this->content .= ' ' . $wordContent;
        }
    }

    private function isFull(): bool
    {
        return $this->spaceLeft() < 1;
    }

    private function spaceLeft(): int
    {
        return $this->isEmpty()
            ? $this->limit
            : $this->limit - strlen($this->content) - 1;
    }

    private function isEmpty(): bool
    {
        return empty($this->content);
    }
}
