<?php

declare(strict_types=1);

namespace Sun\Currency\Contracts;

interface CourseContract
{
    public function getFromCurrency(): int|string;

    public function getToCurrency(): int|string;

    public function getCoefficient(): float;
}
