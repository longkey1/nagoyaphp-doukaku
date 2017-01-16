<?php namespace NagoyaPHP\Doukaku140509\Domain\Value;

class StaffNumber implements NumberInterface
{
    private $number;

    public function __construct(/* integer */$input)
    {
        return $this->number = $input;
    }

    public function getNumber()
    {
        return $this->number;
    }
}
