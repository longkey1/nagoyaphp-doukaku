<?php

namespace Nagoyaphp\Doukaku;

class Command
{
    /**
     * @var Command|null
     */
    private $delegate;

    /**
     * @var string}null
     */
    private $method;

    public function __construct(string $method = null, Command $delegate = null)
    {
        $this->method = $method;

        $this->delegate = $delegate;
    }

    public function execute(Table $table)
    {
        if ($this->delegate) {
            $this->delegate->execute($table);
        }

        if ($this->method) {
            $this->{$this->method}($table);
        }
    }

    private function a(Table $table)
    {
        $row = $table->getRow(0);
        $table->setRow(0, $this->shiftAndPush($row));
    }

    private function b(Table $table)
    {
        $row = $table->getRow(1);
        $table->setRow(1, $this->shiftAndPush($row));
    }

    private function c(Table $table)
    {
        $row = $table->getRow(2);
        $table->setRow(2, $this->shiftAndPush($row));
    }

    private function d(Table $table)
    {
        $column = $table->getColumn(0);
        $table->setColumn(0, $this->popAndUnshift($column));
    }

    private function e(Table $table)
    {
        $column = $table->getColumn(1);
        $table->setColumn(1, $this->popAndUnshift($column));
    }

    private function f(Table $table)
    {
        $column = $table->getColumn(2);
        $table->setColumn(2, $this->popAndUnshift($column));
    }

    private function g(Table $table)
    {
        $row = $table->getRow(2);
        $table->setRow(2, $this->popAndUnshift($row));
    }

    private function h(Table $table)
    {
        $row = $table->getRow(1);
        $table->setRow(1, $this->popAndUnshift($row));
    }

    private function i(Table $table)
    {
        $row = $table->getRow(0);
        $table->setRow(0, $this->popAndUnshift($row));
    }

    private function j(Table $table)
    {
        $column = $table->getColumn(2);
        $table->setColumn(2, $this->shiftAndPush($column));
    }

    private function k(Table $table)
    {
        $column = $table->getColumn(1);
        $table->setColumn(1, $this->shiftAndPush($column));
    }

    private function l(Table $table)
    {
        $column = $table->getColumn(0);
        $table->setColumn(0, $this->shiftAndPush($column));
    }

    private function shiftAndPush($cells)
    {
        $cell = array_shift($cells);
        array_push($cells, $cell);

        return $cells;
    }

    private function popAndUnshift($cells)
    {
        $cell = array_pop($cells);
        array_unshift($cells, $cell);

        return $cells;
    }
}