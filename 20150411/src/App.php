<?php
/**
 * This file is part of the NagoyaPHP.Study20150411
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Study20150411;

class App
{
    private $parser;
    private $renderer;

    public function __construct($parser, $renderer)
    {
        $this->parser = $parser;
        $this->renderer = $renderer;
    }

    public function run($inputList)
    {
        $tree = [];
        foreach ($inputList as $input) {
            $tree = $this->parse($input, $tree);
        }

        $output = '';
        $output = $this->render($tree);

        return $output;
    }

    private function parse($input, $tree)
    {
        return $this->parser->run($input, $tree);
    }

    private function render($tree)
    {
        return $this->renderer->run($tree);
    }
}
