<?php

namespace Sun\Currency\Contracts;

interface CourseContract
{
    /**
     * @return string|int
     */
    public function getFromCurrency();

    /**
     * @return string|int
     */
    public function getToCurrency();

    public function getCoefficient(): float;
}
