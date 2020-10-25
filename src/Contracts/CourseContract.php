<?php

namespace Sun\Currency\Contracts;

interface CourseContract
{
    public function getFromCurrency(): string;

    public function getToCurrency(): string;

    public function getCoefficient(): float;
}
