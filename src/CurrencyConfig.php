<?php

namespace Sun\Currency;

class CurrencyConfig
{
    public static function tableCurrency()
    {
        return config('currency.table_currency');
    }

    public static function tableCourse()
    {
        return config('currency.table_course');
    }
}
