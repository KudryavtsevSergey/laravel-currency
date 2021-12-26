<?php

namespace Sun\Currency;

use Sun\Currency\Contracts\CourseContract;

class Converter
{
    private CourseContract $course;

    public function __construct(CourseContract $course)
    {
        $this->course = $course;
    }

    public function convert(float $amount): float
    {
        return round($amount * $this->course->getCoefficient(), 2);
    }
}
