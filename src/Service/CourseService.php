<?php

declare(strict_types=1);

namespace Sun\Currency\Service;

use Illuminate\Support\ItemNotFoundException;
use Sun\Currency\Contracts\CourseContract;
use Sun\Currency\Contracts\CoursesContract;
use Sun\Currency\Converter;
use Sun\Currency\Exceptions\CourseNotFoundException;

class CourseService
{
    public function __construct(
        private CoursesContract $courses,
    ) {
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
            $course = $this->courses->getCourses()->firstOrFail(static fn(
                CourseContract $course
            ): bool => $course->getFromCurrency() === $fromCurrency && $course->getToCurrency() === $toCurrency);

            return new Converter($course);
        } catch (ItemNotFoundException $exception) {
            throw new CourseNotFoundException($fromCurrency, $toCurrency, $exception);
        }
    }
}
