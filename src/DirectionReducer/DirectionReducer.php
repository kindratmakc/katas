<?php

namespace Katas\DirectionReducer;

/**
 * @see https://www.codewars.com/kata/550f22f4d758534c1100025a
 */
class DirectionReducer
{
    public function reduce(array $values): array
    {
        $directions = $this->wrap($values);

        $reduced = $this->innerReduce($directions);

        return $this->unwrap($reduced);
    }

    /**
     * @param Direction[] $directions
     *
     * @return Direction[]
     */
    private function innerReduce(array $directions): array
    {
        $reduced = array_reduce($directions, function (array $carry, Direction $direction) {
            if (!empty($carry) && $this->lastDirection($carry)->isOppositeTo($direction)) {
                array_pop($carry);
            } else {
                $carry[] = $direction;
            }

            return $carry;
        }, []);

        return count($reduced) === count($directions)
            ? $reduced
            : $this->innerReduce($reduced);
    }

    private function lastDirection(array $directions): Direction
    {
        return $directions[count($directions) - 1];
    }

    /**
     * @param string[] $values
     *
     * @return Direction[]
     */
    private function wrap(array $values): array
    {
        return array_map(function (string $val) {
            return new Direction($val);
        }, $values);
    }

    /**
     * @param Direction[] $reduced
     *
     * @return string[]
     */
    private function unwrap(array $reduced): array
    {
        return array_map(function (Direction $direction) {
            return $direction->getValue();
        }, $reduced);
    }
}
