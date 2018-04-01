<?php
/**
 * This file is part of the Nagoyaphp.Doukaku
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Nagoyaphp\Doukaku;

class Doukaku
{
    /**
     * @param string $input
     * @return int
     */
    public function run(string $input) : int
    {
        $people = $this->parsePeople($input);
        usort($people, function(Person $peopleA, Person $peopleB) {
            return $peopleB->price() <=> $peopleA->price();
        });

        $infantDiscountCount = $this->infantDiscountCount($people);
        $total = 0;
        foreach($people as $person) {
            if ($infantDiscountCount === 0) {
                $total += $person->price();
                continue;
            }
            if (false === $person->isInfant()) {
                $total += $person->price();
                continue;
            }
            $infantDiscountCount--;
        }

        return $total;
    }

    private function infantDiscountCount(array $people) : int
    {
        $adultCount = 0;
        foreach($people as $person) {
            if ($person->isAdult()) {
                $adultCount++;
            }
        }

        return $adultCount * 2;
    }

    private function parsePeople(string $str) : array
    {
        list($price, $peopleString) = explode(':', $str);
        $personStrings = explode(',', $peopleString);

        $people = [];
        foreach($personStrings as $personString) {
            $people[] = new Person($personString, $price);
        }

        return $people;
    }
}
