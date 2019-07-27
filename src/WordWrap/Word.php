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

    public function exceeds(int $length): bool
    {
        return $this->length() > $length;
    }

    public function getLeftHalf(int $pos): Word
    {
        return new Word(substr($this->content, 0, $pos));
    }

    public function getRightHalf(int $pos): Word
    {
        return new Word(substr($this->content, $pos));
    }

    /**
     * @return Word[] left and right part
     */
    public function split(int $pos): array
    {
        return [
            $this->getLeftHalf($pos),
            $this->getRightHalf($pos),
        ];
    }

    public function length(): int
    {
        return strlen($this->content);
    }
}
