<?php

namespace Sun\Currency;

use Illuminate\Support\Collection;
use Illuminate\Support\ItemNotFoundException;
use Sun\Currency\Contracts\CourseContract;
use Sun\Currency\Contracts\CoursesContract;
use Sun\Currency\Exceptions\CourseNotFoundException;

class Currency
{
    private Collection $courses;

    public function __construct(
        CoursesContract $courses,
    ) {
        $this->courses = collect($courses->getCourses());
    }

    /**
     * @param string|int $fromCurrency
     * @param string|int $toCurrency
     * @return Converter
     * @throws CourseNotFoundException
     */
    public function createConverter(string|int $fromCurrency, string|int $toCurrency): Converter
    {
        try {
            $course = $this->courses->firstOrFail(static fn(
                CourseContract $course
            ): bool => $course->getFromCurrency() === $fromCurrency && $course->getToCurrency() === $toCurrency);

            return new Converter($course);
        } catch (ItemNotFoundException $exception) {
            throw new CourseNotFoundException($fromCurrency, $toCurrency, $exception);
        }
    }
}
