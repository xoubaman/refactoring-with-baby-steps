<?php
declare(strict_types=1);

namespace App;

class StoryPoint
{
    public function __construct(private int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }
}
