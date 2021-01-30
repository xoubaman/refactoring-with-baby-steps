<?php
declare(strict_types=1);

namespace Test;

use App\SprintReport;
use PHPUnit\Framework\TestCase;

final class SprintReportTest extends TestCase
{
    private SprintReport $sprintReport;

    protected function setUp(): void
    {
        parent::setUp();
        $this->sprintReport = new SprintReport(0);
    }

    /** @test */
    public function completedPointsDoNotChangeWhenAddingZeroStoryPoints(): void
    {
        $this->sprintReport->addCompletedStoryPoints(0);

        $emptyReport = new SprintReport(0);

        self::assertEquals($emptyReport, $this->sprintReport);
    }

    /** @test */
    public function failsWhenAddingLessThanZeroStoryPoints(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->sprintReport->addCompletedStoryPoints(-1);
    }

    /** @test */
    public function registersStoryPointsWhenAddingAValidAmountToAnEmptyReport(): void
    {
        $this->sprintReport->addCompletedStoryPoints(3);

        $expected = new SprintReport(3);
        self::assertEquals($expected, $this->sprintReport);
    }

    /** @test */
    public function addsUpStoryPointsWhenAddingToANonEmptyReport(): void
    {
        $this->sprintReport->addCompletedStoryPoints(3);
        $this->sprintReport->addCompletedStoryPoints(5);

        $expected = new SprintReport(8);
        self::assertEquals($expected, $this->sprintReport);
    }
}
