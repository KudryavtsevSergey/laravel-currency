<?php

declare(strict_types=1);

namespace Sun\Currency;

use Sun\Currency\Contracts\CourseContract;

class Converter
{
    public function __construct(
        private readonly CourseContract $course,
    ) {
    }

    public function convert(int $amount): int
    {
        return (int)round($amount * $this->course->getCoefficient());
    }
}
