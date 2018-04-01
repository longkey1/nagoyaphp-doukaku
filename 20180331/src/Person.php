<?php

namespace Nagoyaphp\Doukaku;

class Person
{
    const AGE_ADULT = 'adult';
    const AGE_CHILD = 'child';
    const AGE_INFANT = 'infant';

    const PRICE_NORMAL = 'normal';
    const PRICE_PASS = 'pass';
    const PRICE_WELFARE = 'welfare';

    /**
     * @var string
     */
    private $ageType;

    /**
     * @var string
     */
    private $priceType;

    /**
     * @var int
     */
    private $standardPrice;

    public function __construct(string $personString, int $standardPrice)
    {
        assert(strlen($personString) !== 2);

        $this->standardPrice = $standardPrice;
        switch ($personString[0]) {
            case 'I':
                $this->ageType = self::AGE_INFANT;
                break;
            case 'C':
                $this->ageType = self::AGE_CHILD;
                break;
            case 'A':
                $this->ageType = self::AGE_ADULT;
                break;

        }
        switch ($personString[1]) {
            case 'n':
                $this->priceType = self::PRICE_NORMAL;
                break;
            case 'p':
                $this->priceType = self::PRICE_PASS;
                break;
            case 'w':
                $this->priceType = self::PRICE_WELFARE;
                break;

        }
    }

    /**
     * @return int
     */
    public function price(): int
    {
        if ($this->priceType === self::PRICE_PASS) {
            return 0;
        }
        if ($this->priceType === self::PRICE_WELFARE) {
            return $this->half($this->normalPrice());
        }

        return $this->normalPrice();
    }

    /**
     * @return bool
     */
    public function isAdult() : bool
    {
        return $this->ageType === self::AGE_ADULT;
    }

    /**
     * @return bool
     */
    public function isChild() : bool
    {
        return $this->ageType === self::AGE_CHILD;
    }

    /**
     * @return bool
     */
    public function isInfant() : bool
    {
        return $this->ageType === self::AGE_INFANT;
    }

    /**
     * @return int
     */
    private function normalPrice(): int
    {
        if ($this->ageType === self::AGE_ADULT) {
            return $this->standardPrice;
        }

        return $this->half($this->standardPrice);
    }

    /**
     * @param int $int
     * @return int
     */
    private function half(int $int): int
    {
        return ceil(($int / 2) / 10) * 10;
    }
}