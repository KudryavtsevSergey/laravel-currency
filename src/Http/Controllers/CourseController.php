<?php

namespace Sun\Currency\Http\Controllers;

use Sun\Currency\Http\Requests\CourseRequest;
use Sun\Currency\Models\Course;

class CourseController extends Controller
{
    /**
     * @var Course
     */
    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index()
    {
        $courses = $this->course->select('course.from_currency_id', 'course.to_currency_id', 'course.coefficient')
            ->get();

        return response()->json($courses);
    }

    public function store(CourseRequest $request)
    {
        $courses = $request->input('courses');

        $this->course->truncate();

        $this->course->insert($courses);

        //TODO: localize
        return response()->json(['message' => 'Courses updated successfully!']);
    }
}
