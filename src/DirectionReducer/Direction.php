<?php

namespace Katas\DirectionReducer;

class Direction
{
    private const OPPOSITES = [
        'WEST' => 'EAST',
        'EAST' => 'WEST',
        'NORTH' => 'SOUTH',
        'SOUTH' => 'NORTH',
    ];

    /** @var string  */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isOppositeTo(Direction $direction): bool
    {
        return self::OPPOSITES[$this->value] === $direction->value;
    }
}
