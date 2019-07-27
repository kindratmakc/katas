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

    public function add(Word $word): void
    {
        $wordContent = (string)$word;
        if ($this->isEmpty()) {
            $this->content = $wordContent;
        } else {
            $this->content .= ' ' . $wordContent;
        }
    }

    public function canAccept(Word $word): bool
    {
        return $word->length() <= $this->spaceLeft();
    }

    public function isFull(): bool
    {
        return $this->spaceLeft() < 1;
    }

    public function spaceLeft(): int
    {
        return $this->isEmpty()
            ? $this->limit - strlen($this->content)
            : $this->limit - strlen($this->content) - 1;
    }

    private function isEmpty(): bool
    {
        return empty($this->content);
    }
}
