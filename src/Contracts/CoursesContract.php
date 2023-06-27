<?php

declare(strict_types=1);

namespace Sun\Currency\Contracts;

use Illuminate\Support\Collection;

/**
 * @template T of CourseContract
 */
interface CoursesContract
{
    /**
     * @return Collection<int, T>
     */
    public function getCourses(): Collection;
}
