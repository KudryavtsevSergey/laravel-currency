<?php

namespace Sun\Currency\Contracts;

interface CoursesContract
{
    /**
     * @return CourseContract[]
     */
    public function getCourses(): array;
}
