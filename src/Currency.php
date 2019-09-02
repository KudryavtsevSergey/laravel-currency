<?php


namespace Sun\Currency;


use Exception;
use Illuminate\Database\Eloquent\Collection;
use Sun\Currency\Models\Course;

class Currency
{
    /**
     * @var Collection
     */
    protected $courses;

    /**
     * @var int
     */
    private $decimals = 2;

    public function __construct(Course $course)
    {
        $tableCourse = CurrencyConfig::tableCourse();

        $this->courses = $course->select("{$tableCourse}.from_currency_id", "{$tableCourse}.to_currency_id", "{$tableCourse}.coefficient")
            ->get();
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
        $course = $this->courses->first(function (Course $course) use ($fromCurrencyId, $toCurrencyId): bool {
            return $course->from_currency_id == $fromCurrencyId && $course->to_currency_id == $toCurrencyId;
        });

        if (empty($course)) {
            //TODO: localize
            throw new Exception('Courses not found.');
        }

        $amount = floatval($amount);
        return number_format($amount * $course->coefficient, $this->decimals, '.', '');
    }
}
