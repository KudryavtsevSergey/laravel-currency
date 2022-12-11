<?php

namespace Sun\Currency;

use Sun\Currency\Contracts\CourseContract;

class Converter
{
    public function __construct(
        private CourseContract $course,
    ) {
    }

    public function convert(int $amount): int
    {
        return round($amount * $this->course->getCoefficient());
    }
}
