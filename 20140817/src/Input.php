<?php namespace NagoyaPHP\Doukaku140509;

class Input
{
    const STAFF_SEPARATOR = '|';
    const NUMBER_SEPARATOR = '_';

    /**
     * parse
     *
     * @param string $input
     * @access public
     * @return array $params
     */
    public function parse($input)
    {
        $staffs = explode(self::STAFF_SEPARATOR, $input);

        $params = array_reduce($staffs, function($result, $staff) {
            list($staffNumber, $lessonClassNumberString) = explode(self::NUMBER_SEPARATOR, $staff);
            $lessonClassNumbers = [];
            foreach (str_split($lessonClassNumberString) as $number) {
                $lessonClassNumbers[] = (int) $number;
            }
            $result[] = compact('staffNumber', 'lessonClassNumbers');

            return $result;
        }, []);

        return $params;
    }
}
