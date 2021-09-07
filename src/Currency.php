<?php

namespace Sun\Currency;

use Sun\Currency\Contracts\CourseContract;
use Sun\Currency\Contracts\CoursesContract;
use Sun\Currency\Exceptions\CourseNotFoundException;

class Currency
{
    private int $decimals = 2;
    private CoursesContract $courses;

    public function __construct(CoursesContract $courses)
    {
        $this->courses = $courses;
    }

    public function decimals(int $decimals): self
    {
        $this->decimals = $decimals;
        return $this;
    }

    /**
     * @param string|int $fromCurrency
     * @param string|int $toCurrency
     * @param float $amount
     * @return float
     * @throws CourseNotFoundException
     */
    public function convert($fromCurrency, $toCurrency, float $amount): float
    {
        $courses = $this->courses->getCourses();
        $courses = collect($courses);

        $course = $courses->first(function (CourseContract $course) use ($fromCurrency, $toCurrency): bool {
            return $course->getFromCurrency() == $fromCurrency && $course->getToCurrency() == $toCurrency;
        });

        if (empty($course)) {
            throw new CourseNotFoundException($fromCurrency, $toCurrency);
        }

        return number_format($amount * $course->getCoefficient(), $this->decimals, '.', '');
    }
}
