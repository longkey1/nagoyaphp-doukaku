<?php namespace NagoyaPHP\Doukaku140509;

class App
{
    private $setting = [
        'maxClassNumber' => 5,
        'input' => __NAMESPACE__ . '\Input',
        'output' => __NAMESPACE__ . '\Output',
        'lessonClassFactory' => __NAMESPACE__ . '\Domain\Factory\LessonClassFactory',
        'numberFactory' => __NAMESPACE__ . '\Domain\Factory\NumberFactory',
        'staffFactory' => __NAMESPACE__ . '\Domain\Factory\StaffFactory',
        'lessonClassNumber' => __NAMESPACE__ . '\Domain\Value\LessonClassNumber',
        'lessonClassCollection' => __NAMESPACE__ . '\Domain\Value\LessonClassCollection',
        'memberSelectionPolicy' => __NAMESPACE__ . '\Domain\Policy\OrderOfPriorityAndEntryPolicy',
    ];

    private $lessonClasses;
    private $memberSelectionPolicy;

    public function run($input)
    {
        // initialize
        $this->initialize();

        // entry
        $this->entry($input);

        // output
        return $this->output();
    }

    private function initialize()
    {
        // memberSelectionPolicy
        $this->memberSelectionPolicy = $this->createMemberSelectionPolicy();

        // lessonClasses
        $this->lessonClasses = $this->createLessonClassCollection();

        for ($i = 1; $i <= $this->setting['maxClassNumber']; $i++) {
            $lessonClass = $this->createLessonClassFactory()->create($i, $this->memberSelectionPolicy);
            $this->lessonClasses->append($lessonClass);
        }

        return true;
    }

    private function entry($input)
    {
        foreach ($this->parse($input) as $i => $params) {
            $entryNumber = $i + 1;
            $this->createStaffBy($entryNumber, $params)->entry();
        }

        return true;
    }

    private function output()
    {
        return $this->createOutput()->output($this->lessonClasses);
    }



    /**
     * sub methods
     */
    private function parse($input)
    {
        return $this->createInput()->parse($input);
    }

    private function createStaffBy($entryNumber, $params)
    {
        $staffNumber = $params['staffNumber'];
        $entryLessonClasses = $this->getLessonClassesBy($params['lessonClassNumbers']);

        return $this->createStaffFactory()->create($staffNumber, $entryNumber, $entryLessonClasses);
    }

    private function getLessonClassesBy(array $lessonNumbers)
    {
        $result = $this->createLessonClassCollection();

        foreach ($lessonNumbers as $numberString) {
            $lessonClassNumber = $this->createLessonClassNumberFactory()->create($numberString);
            $lessonClass = $this->lessonClasses->getLessonClassByNumber($lessonClassNumber);
            $result->append($lessonClass);
        }

        return $result;
    }

    private function createInput()
    {
        return new $this->setting['input'];
    }

    private function createOutput()
    {
        return new $this->setting['output'];
    }

    private function createLessonClassFactory()
    {
        return new $this->setting['lessonClassFactory'];
    }

    private function createLessonClassNumberFactory()
    {
        return new $this->setting['numberFactory']($this->setting['lessonClassNumber']);
    }

    private function createStaffFactory()
    {
        return new $this->setting['staffFactory'];
    }

    private function createMemberSelectionPolicy()
    {
        return new $this->setting['memberSelectionPolicy'];
    }

    private function createLessonClassCollection()
    {
        return new $this->setting['lessonClassCollection'];
    }
}
