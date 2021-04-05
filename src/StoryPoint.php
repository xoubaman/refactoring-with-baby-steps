<?php
declare(strict_types=1);

namespace App;

use InvalidArgumentException;

class StoryPoint
{
    public function __construct(private int $value)
    {
        if ($value < 0) {
            throw new InvalidArgumentException('SP cannot be less than 0');
        }
    }

    public function value(): int
    {
        return $this->value;
    }

    public function sum(StoryPoint $storyPoints): self
    {
        return new self($this->value + $storyPoints->value());
    }
}
