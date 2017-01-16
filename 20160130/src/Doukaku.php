<?php
/**
 * This file is part of the NagoyaPHP.Doukaku
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Doukaku;

class Doukaku
{
    public function run($input)
    {
        list($size, $actions) = explode(':', $input);
        $this->chairs = array_fill(0, $size, '-');

        for ($i = 0; $i < strlen($actions); $i++) {
            $action = $actions[$i];
            // away
            if (ctype_lower($actions[$i])) {
                $this->away($actions[$i]);
            // enter
            } else {
                $this->enter($action);
            }
        }

        return implode($this->chairs);
    }

    private function away($action)
    {
        if (false !== array_search(strtoupper($action), $this->chairs)) {
            $this->chairs[array_search(strtoupper($action), $this->chairs)] = '-';
        }
    }

    private function enter($action)
    {
        $point = 0;
        $number = 0;
        foreach ($this->priorities() as $current => $priority) {
            if ($point < $priority) {
                $point = $priority;
                $number = $current;
            }
        }
        $this->chairs[$number] = $action;
    }

    private function priorities()
    {
        $priorities = array_fill(0, count($this->chairs), 0);

        foreach ($this->chairs as $current => $chair) {
            $point = 1;
            if ($this->chairs[$current] != '-') {
                continue;
            };
            if ($current == 0) {
                $point++;
            }
            if ($current == (count($this->chairs) - 1)) {
                $point++;
            }
            $prev = $current - 1;
            $next = $current + 1;
            if ($prev >= 0 && $this->chairs[$prev] == '-') {
                $point++;
            }
            if ($next < count($this->chairs) && $this->chairs[$next] == '-') {
                $point++;
            }
            $priorities[$current] = $point;
        }

        return $priorities;
    }
}
