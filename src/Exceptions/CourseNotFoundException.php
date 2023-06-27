<?php

declare(strict_types=1);

namespace Sun\Currency\Exceptions;

use Exception;
use Throwable;

class CourseNotFoundException extends Exception
{
    public function __construct(string|int $fromCurrency, string|int $toCurrency, Throwable $previous)
    {
        $message = sprintf('Courses not found. From currency: %s, To currency: %s', $fromCurrency, $toCurrency);
        parent::__construct($message, 0, $previous);
    }
}
