<?php

namespace Nagoyaphp\Doukaku;

class Doukaku
{
    public function run(string $input): string
    {
        $table = new Table([
            [1,2,3],
            [4,5,6],
            [7,8,9],
        ]);
        $command = $this->buildCommand($input);
        $command->execute($table);

        return $table->toString();
    }

    public function buildCommand(string $input): Command
    {
        $command = new Command();
        foreach (str_split($input) as $method) {
            $command = new Command($method, $command);
        }

        return $command;
    }
}
