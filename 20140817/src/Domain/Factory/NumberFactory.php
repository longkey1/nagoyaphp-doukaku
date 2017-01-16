<?php namespace NagoyaPHP\Doukaku140509\Domain\Factory;

class NumberFactory
{
    private $numberClass = null;

    public function __construct(/*string*/ $numberClassName)
    {
        return $this->numberClass = $numberClassName;
    }

    public function create(/*int*/$number)
    {
        return new $this->numberClass($number);
    }
}
