<?php
declare(strict_types=1);

namespace Katas\IsPeriodLate;

use DateTime;

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
