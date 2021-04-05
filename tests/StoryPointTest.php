<?php
declare(strict_types=1);

namespace Test;

use App\StoryPoint;
use PHPUnit\Framework\TestCase;

final class StoryPointTest extends TestCase
{
    /** @test */
    public function sumProducesNewStoryPointWithSumValue(): void
    {
        $threeSP = new StoryPoint(3);
        $twoSP  = new StoryPoint(2);
        $sum   = $threeSP->sum($twoSP);

        self::assertNotSame($threeSP, $sum);
        self::assertNotSame($twoSP, $sum);
        self::assertEquals(5, $sum->value());
    }
}
