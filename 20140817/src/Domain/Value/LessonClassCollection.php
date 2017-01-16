<?php namespace NagoyaPHP\Doukaku140509\Domain\Value;

use NagoyaPHP\Doukaku140509\Domain\Value\NumberInterface;
use NagoyaPHP\Doukaku140509\Domain\Value\Staff;

class LessonClassCollection extends \ArrayObject
{
    public function entry(Staff $staff)
    {
        foreach ($this as $lessonClass) {
            $lessonClass->entry($staff);
        }

        return true;
    }

    public function getLessonClassByNumber(NumberInterface $lessonClassNumber)
    {
        foreach ($this as $lessonClass) {
            if ($lessonClass->equalNumber($lessonClassNumber)) {
                return $lessonClass;
            }
        }

        return false;
    }
}
