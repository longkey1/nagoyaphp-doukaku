<?php
/**
 * This file is part of the NagoyaPHP.Study20150411
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Study20150411;

class MarkdownRenderer
{
    const INDENT_LENGTH = 4;

    public function run($branches, $indentDepth = 0)
    {
        $output = '';
        foreach ($branches as $branch) {
            $output .= sprintf('%s- %s', $this->indent($indentDepth), $branch['text']) . PHP_EOL;
            if (count($branch['children'])) {
                $output .= $this->run($branch['children'], $indentDepth + self::INDENT_LENGTH);
            }
        }

        return $output;
    }

    private function indent($length = 0)
    {
        return str_repeat(' ', $length);
    }
}
