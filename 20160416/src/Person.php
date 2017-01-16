<?php
/**
 * This file is part of the NagoyaPHP.Doukaku
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Doukaku;

class Person
{
    const ME = 'me';
    const MOTHER = 'mo';
    const DAUGHTER = 'da';
    const SISTER = 'si';
    const AUNT = 'au';
    const NIECE = 'ni';
    const COUSIN = 'co';
    const OTHER = '-';

    private $id;
    private $parent;
    private $children;

    public function __construct($id, $children = [])
    {
        $this->id = $id;
        $this->children = [];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent(Person $parent)
    {
        return $this->parent = $parent;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function addChild(Person $child)
    {
        $this->children[] = $child;
    }

    public function getSisters()
    {
        if (!empty($this->parent)) {
            return $this->parent->children;
        }

        return [];
    }

    public function whoIs(Person $her)
    {
        if ($this === $her) {
            return self::ME;
        }
        if ($this->parent === $her) {
            return self::MOTHER;
        }
        if (in_array($her, $this->getChildren())) {
            return self::DAUGHTER;
        }
        if (!empty($this->getParent()) && in_array($her, $this->getSisters())) {
            return self::SISTER;
        }
        if (!empty($this->getParent()) && in_array($her, $this->parent->getSisters())) {
            return self::AUNT;
        }
        foreach ($this->getSisters() as $sister) {
            if (in_array($her, $sister->getChildren())) {
                return self::NIECE;
            }
        }
        if (!empty($this->parent)) {
            foreach ($this->getParent()->getSisters() as $aunt) {
                if (in_array($her, $aunt->getChildren())) {
                    return self::COUSIN;
                }
            }
        }

        return self::OTHER;
    }
}
