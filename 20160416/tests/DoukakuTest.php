<?php

namespace NagoyaPHP\Doukaku;

class DoukakuTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Doukaku
     */
    protected $skeleton;

    protected function setUp()
    {
        parent::setUp();
        $this->skeleton = new Doukaku;
    }

    /**
     * @dataProvider provideData
     */
    public function testRun($input, $expected)
    {
        $actual = $this->skeleton->run($input);
        $this->assertEquals($expected, $actual);
    }

    public function provideData()
    {
        return [
            0 => ['5->2', 'mo'],
            1 => ['28->10', 'au'],
            2 => ['1->1', 'me'],
            3 => ['40->40', 'me'],
            4 => ['27->27', 'me'],
            5 => ['7->2', 'mo'],
            6 => ['40->13', 'mo'],
            7 => ['9->3', 'mo'],
            8 => ['4->1', 'mo'],
            9 => ['1->3', 'da'],
            10 => ['12->35', 'da'],
            11 => ['3->8', 'da'],
            12 => ['6->19', 'da'],
            13 => ['38->40', 'si'],
            14 => ['9->8', 'si'],
            15 => ['4->2', 'si'],
            16 => ['15->16', 'si'],
            17 => ['40->12', 'au'],
            18 => ['10->4', 'au'],
            19 => ['21->5', 'au'],
            20 => ['8->2', 'au'],
            21 => ['3->5', 'ni'],
            22 => ['11->39', 'ni'],
            23 => ['2->13', 'ni'],
            24 => ['13->32', 'ni'],
            25 => ['14->22', 'co'],
            26 => ['40->34', 'co'],
            27 => ['5->8', 'co'],
            28 => ['12->10', 'co'],
            29 => ['1->27', '-'],
            30 => ['8->1', '-'],
            31 => ['12->22', '-'],
            32 => ['2->40', '-'],
            33 => ['32->31', '-'],
            34 => ['13->14', '-'],
        ];
    }
}
