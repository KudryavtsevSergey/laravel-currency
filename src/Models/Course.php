<?php

namespace Sun\Currency\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;
use Sun\Currency\CurrencyConfig;

/**
 * @property int $from_currency_id
 * @property int $to_currency_id
 * @property float $coefficient
 */
class Course extends Eloquent
{
    public $incrementing = false;
    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = CurrencyConfig::tableCourse();
    }

    protected $casts = [
        'from_currency_id' => 'int',
        'to_currency_id' => 'int',
        'coefficient' => 'float'
    ];

    protected $fillable = [
        'from_currency_id',
        'to_currency_id',
        'coefficient'
    ];
}
