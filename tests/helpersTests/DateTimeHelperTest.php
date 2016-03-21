<?php namespace Sagenda\Tests\HelpersTests\DateTimeHelperTest;
use Sagenda\Helpers\DateTimeHelper;
use PHPUnit_Framework_TestCase;
//require_once(dirname(dirname(__DIR__)) . '/helpers/DateTimeHelper.php');

class DateTimeHelperTest extends PHPUnit_Framework_TestCase
{
    public function testconvertWPtoJSDateDayDTest()
    {
        $dateFormatInput = "d/m/y";
        $dateFormatOutput = DateTimeHelper::convertWPtoJSDate($dateFormatInput);
        $this->assertContains ("dd", $dateFormatOutput);
    }
}
