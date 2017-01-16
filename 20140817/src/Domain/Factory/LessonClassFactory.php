<?php namespace NagoyaPHP\Doukaku140509\Domain\Factory;

use NagoyaPHP\Doukaku140509\Domain\Value\LessonClass;
use NagoyaPHP\Doukaku140509\Domain\Value\LessonClassNumber;
use NagoyaPHP\Doukaku140509\Domain\Value\StaffCollection;

class LessonClassFactory
{
    public function create(/*int*/$number, /*string*/ $memberSelectionPolicy)
    {
        return new LessonClass(
            new LessonClassNumber($number),
            new StaffCollection,
            new $memberSelectionPolicy
        );
    }
}
