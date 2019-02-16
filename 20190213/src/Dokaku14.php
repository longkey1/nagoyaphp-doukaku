<?php

declare(strict_types=1);

namespace Nagoyaphp\Dokaku14;


class Dokaku14
{
    public function run(string $input): int
    {
        [$min, $max, $base] = $this->parse($input);

        $count = 0;
        for($i = $min; $i < $max; $i++) {
            if ($this->isPalindrome(base_convert((string) $i, 10, (int) $base))) {
                $count++;
            }
        }

        return $count;
    }

    private function numbers(int $min, int $max): \Iterator
    {
        for($i = $min; $i < $max; $i++) {
            yield $i;
        }
    }

    private function parse(string $input): array
    {
        return explode(',', $input);
    }

    private function isPalindrome(string $input): bool
    {
        return $input === strrev($input);
    }
}
