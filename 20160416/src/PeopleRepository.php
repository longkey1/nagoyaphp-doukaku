<?php
/**
 * This file is part of the NagoyaPHP.Doukaku
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Doukaku;

class PeopleRepository
{
    private static $seeds = [
        1 => ['parent' => null, 'children' => [2, 3, 4]],
        2 => ['parent' => 1, 'children' => [5, 6, 7]],
        3 => ['parent' => 1, 'children' => [8, 9, 10]],
        4 => ['parent' => 1, 'children' => [11, 12, 13]],
        5 => ['parent' => 2, 'children' => [14, 15, 16]],
        6 => ['parent' => 2, 'children' => [17, 18, 19]],
        7 => ['parent' => 2, 'children' => [20, 21, 22]],
        8 => ['parent' => 3, 'children' => [23, 24, 25]],
        9 => ['parent' => 3, 'children' => [26, 27, 28]],
        10 => ['parent' => 3, 'children' => [29, 30, 31]],
        11 => ['parent' => 4, 'children' => [32, 33, 34]],
        12 => ['parent' => 4, 'children' => [35, 36, 37]],
        13 => ['parent' => 4, 'children' => [38, 39, 40]],
        14 => ['parent' => 5, 'children' => []],
        15 => ['parent' => 5, 'children' => []],
        16 => ['parent' => 5, 'children' => []],
        17 => ['parent' => 6, 'children' => []],
        18 => ['parent' => 6, 'children' => []],
        19 => ['parent' => 6, 'children' => []],
        20 => ['parent' => 7, 'children' => []],
        21 => ['parent' => 7, 'children' => []],
        22 => ['parent' => 7, 'children' => []],
        23 => ['parent' => 8, 'children' => []],
        24 => ['parent' => 8, 'children' => []],
        25 => ['parent' => 8, 'children' => []],
        26 => ['parent' => 9, 'children' => []],
        27 => ['parent' => 9, 'children' => []],
        28 => ['parent' => 9, 'children' => []],
        29 => ['parent' => 10, 'children' => []],
        30 => ['parent' => 10, 'children' => []],
        31 => ['parent' => 10, 'children' => []],
        32 => ['parent' => 11, 'children' => []],
        33 => ['parent' => 11, 'children' => []],
        34 => ['parent' => 11, 'children' => []],
        35 => ['parent' => 12, 'children' => []],
        36 => ['parent' => 12, 'children' => []],
        37 => ['parent' => 12, 'children' => []],
        38 => ['parent' => 13, 'children' => []],
        39 => ['parent' => 13, 'children' => []],
        40 => ['parent' => 13, 'children' => []],
    ];

    private $people = [];

    public static function create()
    {
        $repository = new PeopleRepository();
        foreach (self::$seeds as $id => $values) {
            // person
            $person = $repository->find($id);
            if (empty($person)) {
                $person = new Person($id);
                $repository->add($person);
            }
            // parent
            if ($values['parent']) {
                $parent = $repository->find($values['parent']);
                if (empty($parent)) {
                    $parent = new Person($values['parent']);
                    $repository->add($parent);
                }
                $person->setParent($parent);
            }
            // children
            foreach ($values['children'] as $childId) {
                $child = $repository->find($childId);
                if (empty($child)) {
                    $child = new Person($childId);
                    $repository->add($child);
                }
                $person->addChild($child);
            }
        }

        return $repository;
    }

    public function add(Person $person)
    {
        $this->people[$person->getId()] = $person;
    }

    public function find($id)
    {
        if (isset($this->people[$id])) {
            return $this->people[$id];
        }

        return null;
    }
}
