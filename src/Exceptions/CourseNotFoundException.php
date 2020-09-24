<?php

namespace Sun\Currency\Exceptions;

use Exception;

class CourseNotFoundException extends Exception
{
    public function __construct(int $fromCurrencyId, int $toCurrencyId)
    {
        $message = sprintf('Courses not found. FromCurrency: %s, ToCurrency: %s', $fromCurrencyId, $toCurrencyId);
        parent::__construct($message);
    }
}
