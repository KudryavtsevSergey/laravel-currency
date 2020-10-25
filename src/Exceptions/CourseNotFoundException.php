<?php

namespace Sun\Currency\Exceptions;

use Exception;

class CourseNotFoundException extends Exception
{
    public function __construct(string $fromCurrency, string $toCurrency)
    {
        $message = sprintf('Courses not found. From currency: %s, To currency: %s', $fromCurrency, $toCurrency);
        parent::__construct($message);
    }
}
