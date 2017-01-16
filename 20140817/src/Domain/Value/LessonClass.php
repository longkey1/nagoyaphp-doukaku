<?php namespace NagoyaPHP\Doukaku140509\Domain\Value;

use NagoyaPHP\Doukaku140509\Domain\Value\NumberInterface;
use NagoyaPHP\Doukaku140509\Domain\Value\StaffCollection;
use NagoyaPHP\Doukaku140509\Domain\Policy\MemberSelectionPolicyInterface;

class LessonClass
{
    private $number;
    private $entryStaffs;
    private $memberSelectionPolicy;

    public function __construct(
        NumberInterface $number,
        StaffCollection $entryStaffs,
        MemberSelectionPolicyInterface $memberSelectionPolicy
    ) {
        $this->number = $number;
        $this->entryStaffs = $entryStaffs;
        $this->memberSelectionPolicy = $memberSelectionPolicy;
    }

    public function number()
    {
        return $this->number->getNumber();
    }

    public function equalNumber(NumberInterface $number)
    {
        return $this->number->getNumber() === $number->getNumber();
    }

    public function entry(Staff $staff)
    {
        $this->entryStaffs->append($staff);

        return true;
    }

    public function getEntryStaffs()
    {
        return $this->entryStaffs->getArrayCopy();
    }

    public function getStaffNumbers()
    {
        $members = call_user_func($this->memberSelectionPolicy, $this);

        return array_reduce($members, function($staff, $result) {
            $result[] = $staff->getNumber();

            return $result;
        }, []);
    }
}
