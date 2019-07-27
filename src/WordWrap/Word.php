<?php
declare(strict_types=1);

namespace Katas\WordWrap;

class Word
{
    /**
     * @var string
     */
    private $content;

    public function __construct(string $content)
    {
        $this->content = $content;
    }

    public function __toString()
    {
        return $this->content;
    }

    public function fitsIn(int $limit): bool
    {
        return $this->length() <= $limit;
    }

    /**
     * @return Word[] left and right part
     */
    public function split(int $pos): array
    {
        return [
            $this->getLeftPart($pos),
            $this->getRightPart($pos),
        ];
    }

    private function getLeftPart(int $pos): Word
    {
        return new Word(substr($this->content, 0, $pos));
    }

    private function getRightPart(int $pos): Word
    {
        return new Word(substr($this->content, $pos));
    }

    private function length(): int
    {
        return strlen($this->content);
    }
}
