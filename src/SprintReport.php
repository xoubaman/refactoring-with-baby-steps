<?php
declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class SprintReport
{
    private ?StoryPoint $completedStoryPointsVO = null;

    public function __construct(
        StoryPoint $completedStoryPoints
    ) {
        $this->completedStoryPoints = $completedStoryPoints->value();
    }

    /** @deprecated */
    public function addCompletedStoryPointsWithInt(int $amount): void
    {
        $storyPoint = new StoryPoint($amount);
        $this->addCompletedStoryPoints($storyPoint);
    }

    public function addCompletedStoryPoints(StoryPoint $amount): void
    {
        if ($amount->value() < 0) {
            throw new InvalidArgumentException('SP cannot be less than 0');
        }

        $this->completedStoryPoints += $amount->value();

        if ($this->completedStoryPointsVO) {
            $this->completedStoryPointsVO = $this->completedStoryPointsVO->sum($amount);
        }
    }
}
