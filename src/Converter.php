<?php

namespace Sun\Currency;

use Sun\Currency\Contracts\CourseContract;

class Converter
{
    public function __construct(
        private CourseContract $course,
    ) {
    }

    public function convert(float $amount): float
    {
        return round($amount * $this->course->getCoefficient(), 2);
    }
}
