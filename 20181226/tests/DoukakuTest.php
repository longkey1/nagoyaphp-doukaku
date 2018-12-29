<?php
/**
 * This file is part of the Nagoyaphp.Doukaku
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Nagoyaphp\Doukaku;

use PHPUnit\Framework\TestCase;

class DoukakuTest extends TestCase
{
    /**
     * @var Doukaku
     */
    protected $doukaku;

    protected function setUp()
    {
        $this->doukaku = new Doukaku;
    }

    public function testIsInstanceOfDoukaku()
    {
        $actual = $this->doukaku;
        $this->assertInstanceOf(Doukaku::class, $actual);
    }
}
