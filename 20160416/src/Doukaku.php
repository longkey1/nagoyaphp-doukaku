<?php
/**
 * This file is part of the NagoyaPHP.Doukaku
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace NagoyaPHP\Doukaku;

class Doukaku
{
    private $repository;

    public function __construct()
    {
        $this->repository = PeopleRepository::create();
    }

    public function run($input)
    {
        // parse
        list($myId, $herId) = $this->parse($input);

        // find
        $me = $this->repository->find($myId);
        $her = $this->repository->find($herId);

        // who is her
        return $me->whoIs($her);
    }

    private function parse($input)
    {
        return explode('->', $input);
    }
}
