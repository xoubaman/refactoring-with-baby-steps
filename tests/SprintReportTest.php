<?php
declare(strict_types=1);

namespace Test;

use App\SprintReport;
use App\StoryPoint;
use PHPUnit\Framework\TestCase;

final class SprintReportTest extends TestCase
{
    private SprintReport $sprintReport;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sprintReport = new SprintReport(new StoryPoint(0));
    }

    /** @test */
    public function completedPointsDoNotChangeWhenAddingZeroStoryPoints(): void
    {
        $this->sprintReport->addCompletedStoryPoints(new StoryPoint(0));

        $emptyReport = new SprintReport(new StoryPoint(0));

        self::assertEquals($emptyReport, $this->sprintReport);
    }

    /** @test */
    public function failsWhenAddingLessThanZeroStoryPoints(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->sprintReport->addCompletedStoryPoints(new StoryPoint(-1));
    }

    /** @test */
    public function registersStoryPointsWhenAddingAValidAmountToAnEmptyReport(): void
    {
        $this->sprintReport->addCompletedStoryPoints(new StoryPoint(3));

        $expected = new SprintReport(new StoryPoint(3));
        self::assertEquals($expected, $this->sprintReport);
    }

    /** @test */
    public function addsUpStoryPointsWhenAddingToANonEmptyReport(): void
    {
        $this->sprintReport->addCompletedStoryPoints(new StoryPoint(3));
        $this->sprintReport->addCompletedStoryPoints(new StoryPoint(5));

        $expected = new SprintReport(new StoryPoint(8));
        self::assertEquals($expected, $this->sprintReport);
    }
}
