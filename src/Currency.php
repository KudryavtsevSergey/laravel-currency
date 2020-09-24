<?php

namespace Sun\Currency;

use Sun\Currency\Models\Course;
use Sun\Currency\Exceptions\CourseNotFoundException;

class Currency
{
    private Course $course;
    private int $decimals = 2;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function decimals(int $decimals): self
    {
        $this->decimals = $decimals;
        return $this;
    }

    /**
     * @param int $fromCurrencyId
     * @param int $toCurrencyId
     * @param $amount
     * @return string
     * @throws CourseNotFoundException
     */
    public function convert(int $fromCurrencyId, int $toCurrencyId, $amount): string
    {
        $tableCourse = CurrencyConfig::tableCourse();
        $courses = $this->course->select("{$tableCourse}.from_currency_id", "{$tableCourse}.to_currency_id", "{$tableCourse}.coefficient")
            ->get();

        $course = $courses->first(function (Course $course) use ($fromCurrencyId, $toCurrencyId): bool {
            return $course->from_currency_id == $fromCurrencyId && $course->to_currency_id == $toCurrencyId;
        });

        if (empty($course)) {
            throw new CourseNotFoundException($fromCurrencyId, $toCurrencyId);
        }

        $amount = floatval($amount);
        return number_format($amount * $course->coefficient, $this->decimals, '.', '');
    }
}
