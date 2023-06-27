<?php

declare(strict_types=1);

namespace Sun\Currency;

use Sun\Currency\Exceptions\CourseNotFoundException;
use Sun\Currency\Service\CourseService;

class Currency
{
    /**
     * @param string|int $fromCurrency
     * @param string|int $toCurrency
     * @return Converter
     * @throws CourseNotFoundException
     */
    public function createConverter(string|int $fromCurrency, string|int $toCurrency): Converter
    {
        /** @var CourseService $courseService */
        $courseService = app(CourseService::class);
        return $courseService->createConverter($fromCurrency, $toCurrency);
    }
}
