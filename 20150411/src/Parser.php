<?php
/**
 * This file is part of the NagoyaPHP.Study20150411
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 */
namespace NagoyaPHP\Study20150411;

class Parser
{
    public function run($branch, $tree)
    {
        if (empty($branch['parent_id'])) {
            $tree[$branch['id']] = ['text' => $branch['value'], 'children' => []];
            return $tree;
        }
        if (in_array($branch['parent_id'], array_keys($tree))) {
            $tree[$branch['parent_id']]['children'][$branch['id']] = ['text' => $branch['value'], 'children' => []];
            return $tree;
        }
        foreach ($tree as $id => $subTree) {
            $result = $this->run($branch, $subTree['children']);
            if (false !== $result) {
                $tree[$id]['children'] = $result;
                return $tree;
            }
        }

        return false;
    }
}
