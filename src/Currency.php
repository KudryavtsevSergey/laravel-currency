<?php


namespace Sun\Currency;


use Exception;
use Illuminate\Database\Eloquent\Collection;
use Sun\Currency\Models\Course;

class Currency
{
    /**
     * @var array
     */
    protected $courses = [];

    /**
     * @var int
     */
    private $decimals = 2;

    public function __construct(Course $course)
    {
        $courses = $course
            ->select('course.from_currency_id', 'course.to_currency_id', 'course.coefficient')
            ->get();

        foreach ($courses as $course) {
            $this->courses[$course->from_currency_id][$course->to_currency_id] = $course->coefficient;
        }
    }

    public function decimals(int $decimals)
    {
        $this->decimals = $decimals;
        return $this;
    }

    /**
     * @param int $fromCurrencyId
     * @param int $toCurrencyId
     * @param $amount
     * @return string
     * @throws Exception
     */
    public function convert(int $fromCurrencyId, int $toCurrencyId, $amount): string
    {
        if (!isset($this->courses[$fromCurrencyId])) {
            throw new Exception('Courses not found.');
        }

        if (!isset($this->courses[$fromCurrencyId][$toCurrencyId])) {
            throw new Exception('Courses not found.');
        }

        $course = $this->courses[$fromCurrencyId][$toCurrencyId];

        $amount = floatval($amount);
        return number_format($amount * $course, $this->decimals);
    }
}
