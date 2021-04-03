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
        $storyPoint = new StoryPoint($amount);

        if ($amount < 0) {
            throw new InvalidArgumentException('SP cannot be less than 0');
        }

        $this->addCompletedStoryPointsWithVO($storyPoint);

        $this->completedStoryPoints += $amount;
    }

    public function addCompletedStoryPointsWithVO(StoryPoint $amount): void
    {
        if ($amount->value() < 0) {
            throw new InvalidArgumentException('SP cannot be less than 0');
        }
    }
}
