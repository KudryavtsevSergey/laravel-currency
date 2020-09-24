<?php

namespace Sun\Currency\Http\Controllers;

use Sun\Currency\CurrencyConfig;
use Sun\Currency\Http\Requests\CourseRequest;
use Sun\Currency\Models\Course;

class CourseController extends Controller
{
    protected Course $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $tableCourse = CurrencyConfig::tableCourse();

        $courses = $this->course->select("{$tableCourse}.from_currency_id", "{$tableCourse}.to_currency_id", "{$tableCourse}.coefficient")
            ->get();

        return response()->json($courses);
    }

    public function store(CourseRequest $request)
    {
        $courses = $request->input('courses');

        $this->course->truncate();

        $this->course->insert($courses);

        return $this->index();
    }
}
