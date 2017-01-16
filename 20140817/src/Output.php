<?php namespace NagoyaPHP\Doukaku140509;

use NagoyaPHP\Doukaku140509\Domain\Value\LessonClassCollection;

class Output
{
    const CLASS_SEPARATOR = '|';
    const STAFF_SEPARATOR = ':';

    /**
     * build
     *
     * @param LessonClassCollection $lessonClasses
     * @static
     * @access public
     * @return string
     */
    public function output(LessonClassCollection $lessonClasses)
    {
        $lessonClassStringList = array_reduce((array) $lessonClasses, function($result, $lessonClass) {
            $lessonClassNumber = $lessonClass->number();
            $staffNumberString = implode(self::STAFF_SEPARATOR, $lessonClass->getStaffNumbers());

            $result[] = sprintf('%d_%s', $lessonClassNumber, $staffNumberString);

            return $result;
        }, []);

        return implode(self::CLASS_SEPARATOR, $lessonClassStringList);
    }
}
