<?php
declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class SprintReport {
    public function __construct(
        private int $completedStoryPoints,
    ){}

    /** @deprecated */
    public function addCompletedStoryPointsWithInt(int $amount): void
    {
        $storyPoint = new StoryPoint($amount);
        $this->addCompletedStoryPointsWithVO($storyPoint);
    }

    public function addCompletedStoryPointsWithVO(StoryPoint $amount): void
    {
        if ($amount->value() < 0) {
            throw new InvalidArgumentException('SP cannot be less than 0');
        }

        $this->completedStoryPoints += $amount->value();
    }
}
