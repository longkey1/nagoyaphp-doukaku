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

    public function testNew()
    {
        $actual = $this->skeleton;
        $this->assertInstanceOf('\NagoyaPHP\Doukaku\Doukaku', $actual);
    }

    public function testException()
    {
        $this->setExpectedException('\NagoyaPHP\Doukaku\Exception\LogicException');
        throw new Exception\LogicException;
    }

    /**
     * @test
     * @dataProvider provideData
     **/
    public function testRun($input, $expected)
    {
        $this->assertEquals($expected, $this->skeleton->run($input));
    }

    public function provideData()
    {
        return [
            ['6:NABEbBZn', '-ZAB-E'],
            ['1:A', 'A'],
            ['1:Aa', '-'],
            ['2:AB', 'AB'],
            ['2:AaB', 'B-'],
            ['2:AZa', '-Z'],
            ['2:AZz', 'A-'],
            ['3:ABC', 'ACB'],
            ['3:ABCa', '-CB'],
            ['4:ABCD', 'ADBC'],
            ['4:ABCbBD', 'ABDC'],
            ['4:ABCDabcA', '-D-A'],
            ['5:NEXUS', 'NUESX'],
            ['5:ZYQMyqY', 'ZM-Y-'],
            ['5:ABCDbdXYc', 'AYX--'],
            ['6:FUTSAL', 'FAULTS'],
            ['6:ABCDEbcBC', 'AECB-D'],
            ['7:FMTOWNS', 'FWMNTSO'],
            ['7:ABCDEFGabcdfXYZ', 'YE-X-GZ'],
            ['10:ABCDEFGHIJ', 'AGBHCIDJEF'],
        ];
    }
}
