<?php namespace NagoyaPHP\Doukaku140509\Domain\Factory;

use NagoyaPHP\Doukaku140509\Domain\Value\LessonClassCollection;
use NagoyaPHP\Doukaku140509\Domain\Value\StaffNumber;
use NagoyaPHP\Doukaku140509\Domain\Value\EntryNumber;
use NagoyaPHP\Doukaku140509\Domain\Value\Staff;

class StaffFactory
{
    public function create(/*int*/$number, /*entryNumber*/$entryNumber, LessonClassCollection $entryLessonClasses)
    {
      $staffNumber = new StaffNumber($number);
      $entryNumber = new EntryNumber($entryNumber);

      return new Staff($staffNumber, $entryNumber, $entryLessonClasses);
    }
}
