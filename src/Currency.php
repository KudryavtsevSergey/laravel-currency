<?php

namespace Sun\Currency;

use Sun\Currency\Contracts\CourseContract;
use Sun\Currency\Contracts\CoursesContract;
use Sun\Currency\Exceptions\CourseNotFoundException;

class Currency
{
    private CoursesContract $courses;

    public function __construct(CoursesContract $courses)
    {
        $this->courses = $courses;
    }

    /**
     * @param string|int $fromCurrency
     * @param string|int $toCurrency
     * @return Converter
     * @throws CourseNotFoundException
     */
    public function createConverter($fromCurrency, $toCurrency): Converter
    {
        $courses = collect($this->courses->getCourses());
        /** @var CourseContract|null $course */
        $course = $courses->first(fn(
            CourseContract $course
        ): bool => $course->getFromCurrency() === $fromCurrency && $course->getToCurrency() === $toCurrency);

        if (is_null($course)) {
            throw new CourseNotFoundException($fromCurrency, $toCurrency);
        }

        return new Converter($course);
    }
}
