<?php
declare(strict_types=1);

namespace Katas\IsPeriodLate;

use DateTime;

/**
 * @see https://www.codewars.com/kata/578a8a01e9fd1549e50001f1
 */
class PeriodChecker
{
    public function isLate(DateTime $lastPeriod, DateTime $today, int $cycleLength): bool
    {
        $diff = $today->diff($lastPeriod);

        return $diff->invert
            ? $diff->days > $cycleLength
            : false;
    }
}
