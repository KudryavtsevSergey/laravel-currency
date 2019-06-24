<?php

namespace Sun\Currency\Models;

use \Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Course
 *
 * @property int $from_currency_id
 * @property int $to_currency_id
 * @property float $coefficient
 *
 * @package App\Models
 */
class Course extends Eloquent
{
    protected $table = 'course';
    public $incrementing = false;
    public $timestamps = false;

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
