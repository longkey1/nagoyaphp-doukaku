<?php
/**
 * This file is part of the NagoyaPHP.Study20150411
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Study20150411;

class HtmlRenderer
{
    public function run($branches)
    {
        $output = '<ul>';
        foreach ($branches as $branch) {
            $output .= '<li>' . $branch['text'];
            if (count($branch['children'])) {
                $output .= $this->run($branch['children']);
            }
            $output .= '</li>';
        }
        $output .= '</ul>';

        return $output;
    }
}
