<?php namespace NagoyaPHP\Doukaku140509\Domain\Policy;

use NagoyaPHP\Doukaku140509\Domain\Value\LessonClass;

class OrderOfPriorityAndEntryPolicy implements MemberSelectionPolicyInterface
{
    const MAX_CLASS_MEMBER_NUMBER = 4;

    public function __invoke(LessonClass $lessonClass)
    {
        $members = $lessonClass->getEntryStaffs();

        usort($members, function($a, $b) use ($lessonClass) {
            if ($a->getPriorityNumberBy($lessonClass) < $b->getPriorityNumberBy($lessonClass)) {
                return 1;
            }
            if ($a->getPriorityNumberBy($lessonClass) > $b->getPriorityNumberBy($lessonClass)) {
                return -1;
            }
            if ($a->getEntryNumber() < $b->getEntryNumber()) {
                return 1;
            }
            if ($a->getEntryNumber() > $b->getEntryNumber()) {
                return -1;
            }

            return 0;
        });

        return array_slice($members, self::MAX_CLASS_MEMBER_NUMBER);
    }
}
