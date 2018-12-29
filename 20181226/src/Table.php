<?php

namespace Nagoyaphp\Doukaku;

class Table
{
    private $cells;

    public function __construct($cells)
    {
        $this->cells = $cells;
    }

    public function getRow($index): array
    {
        return $this->cells[$index];
    }

    public function setRow($index, $row)
    {
        $this->cells[$index] = $row;

        return $this;
    }

    public function getColumn($index): array
    {
        $column = [];
        foreach ($this->cells as $row) {
            $column[] = $row[$index];
        }

        return $column;
    }

    public function setColumn($index, $column)
    {
        foreach ($this->cells as $i => $row) {
            $this->cells[$i][$index] = $column[$i];
        }

        return $this;
    }

    public function toString(): string
    {
        $rows = [];
        foreach ($this->cells as $row) {
            $rows[] = implode('', $row);
        }

        return implode('/', $rows);
    }
}