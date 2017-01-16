<?php namespace NagoyaPHP\Doukaku140509\Domain\Policy;

use NagoyaPHP\Doukaku140509\Domain\Value\LessonClass;

interface MemberSelectionPolicyInterface
{
    public function __invoke(LessonClass $lessonClass);
}
