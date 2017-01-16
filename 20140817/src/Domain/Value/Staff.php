<?php namespace NagoyaPHP\Doukaku140509\Domain\Value;

use NagoyaPHP\Doukaku140509\Domain\Value\NumberInterface;
use NagoyaPHP\Doukaku140509\Domain\Value\LessonClassCollection;

class Staff
{
    private $number;
    private $entryNumber;
    private $entryLessonClasses;

    public function __construct(NumberInterface $number, NumberInterface $entryNumber, LessonClassCollection $entryLessonClasses = null)
    {
        $this->number = $number;
        $this->entryNumber = $entryNumber;
        $this->entryLessonClasses = $entryLessonClasses;
    }

    public function getNumber()
    {
        return $this->number->getNumber();
    }

    public function getEntryNumber()
    {
        return $this->entryNumber->getNumber();
    }

    public function entry()
    {
        foreach ($this->entryLessonClasses as $lessonClass) {
            $lessonClass->entry($this);
        }

        return true;
    }

    public function getPriorityNumberBy(LessonClass $lessonClass)
    {
        return array_search($lessonClass, $entryClasses);
    }

}
