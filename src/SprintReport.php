<?php
declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class SprintReport {
    public function __construct(
        private int $completedStoryPoints,
    ){}

    public function addCompletedStoryPoints(int $amount): void
    {
        if ($amount < 0) {
            throw new InvalidArgumentException('SP cannot be less than 0');
        }

        $this->completedStoryPoints += $amount;
    }
}
