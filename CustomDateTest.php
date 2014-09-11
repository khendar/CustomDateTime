<?php
require "CustomDateTime.class.php";
/**
*   PHPUnit Testing Class
*/
class CustomDateTest extends PHPUnit_Framework_TestCase{

    //Testing DaysBetweenDates in seconds
    public function testDaysBetweenDatesSeconds(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:01');
        $this->assertEquals(1, $dt->DaysBetweenDates($dateOne,$dateTwo,'s'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:01:00');
        $this->assertEquals(60, $dt->DaysBetweenDates($dateOne,$dateTwo,'s'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 08:00:00');
        $this->assertEquals(3600, $dt->DaysBetweenDates($dateOne,$dateTwo,'s'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:30');
        $this->assertEquals(30, $dt->DaysBetweenDates($dateOne,$dateTwo,'s'));
    }
    //Testing DaysBetweenDates in minutes
    public function testDaysBetweenDatesMinutes(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:01');
        $this->assertEquals(0, $dt->DaysBetweenDates($dateOne,$dateTwo,'m'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:01:00');
        $this->assertEquals(1, $dt->DaysBetweenDates($dateOne,$dateTwo,'m'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 08:00:00');
        $this->assertEquals(60, $dt->DaysBetweenDates($dateOne,$dateTwo,'m'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:30:00');
        $this->assertEquals(30, $dt->DaysBetweenDates($dateOne,$dateTwo,'m'));
    }

    //Testing DaysBetweenDates in Hours
    public function testDaysBetweenDatesHours(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:01');
        $this->assertEquals(0, $dt->DaysBetweenDates($dateOne,$dateTwo,'h'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:01:00');
        $this->assertEquals(0, $dt->DaysBetweenDates($dateOne,$dateTwo,'h'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 08:00:00');
        $this->assertEquals(1, $dt->DaysBetweenDates($dateOne,$dateTwo,'h'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-2 07:00:00');
        $this->assertEquals(24, $dt->DaysBetweenDates($dateOne,$dateTwo,'h'));
    }
    //Testing DaysBetweenDates in Years
    public function testDaysBetweenDatesYears(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:00');
        $this->assertEquals(0, $dt->DaysBetweenDates($dateOne,$dateTwo,'y'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2015-08-1 07:00:00');
        $this->assertEquals(1, $dt->DaysBetweenDates($dateOne,$dateTwo,'y'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2024-08-1 08:00:00');
        $this->assertEquals(10, $dt->DaysBetweenDates($dateOne,$dateTwo,'y'));

    }

    //Testing WeekdaysBetweenDates in seconds
    public function testWeekdaysBetweenDatesSeconds(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(5*24*60*60, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'s'));

        // Reversed date order
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(1*24*60*60, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'s'));

        // 2 weeks - Sunday to Saturday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-23');
        $this->assertEquals(10*24*60*60, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'s'));

    }

    //Testing WeekdaysBetweenDates in minutes
    public function testWeekdaysBetweenDatesMinutes(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(5*24*60, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'m'));

        // Reversed date order
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(1*24*60, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'m'));

        // 2 weeks - Sunday to Saturday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-23');
        $this->assertEquals(10*24*60, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'m'));

    }

    //Testing WeekdaysBetweenDates in hours
    public function testWeekdaysBetweenDatesHours(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(5*24, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'h'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(1*24, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'h'));

        // 2 weeks - Sunday to Saturday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-23');
        $this->assertEquals(10*24, $dt->WeekdaysBetweenDates($dateOne,$dateTwo,'h'));
    }

    //Testing CompleteWeeks in seconds
    public function testWeeksBetweenDatesSeconds(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(1*7*24*60*60, $dt->CompleteWeeks($dateOne,$dateTwo,'s'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(0, $dt->CompleteWeeks($dateOne,$dateTwo,'s'));

        // 2 weeks - Sunday to Sunday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-24');
        $this->assertEquals(2*7*24*60*60, $dt->CompleteWeeks($dateOne,$dateTwo,'s'));
    }

    //Testing CompleteWeeks in minutes
    public function testWeeksBetweenDatesMinutes(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(1*7*24*60, $dt->CompleteWeeks($dateOne,$dateTwo,'m'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(0, $dt->CompleteWeeks($dateOne,$dateTwo,'m'));

        // 2 weeks - Sunday to Sunday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-24');
        $this->assertEquals(2*7*24*60, $dt->CompleteWeeks($dateOne,$dateTwo,'m'));
    }

    //Testing CompleteWeeks in hours
    public function testWeeksBetweenDatesHours(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(1*7*24, $dt->CompleteWeeks($dateOne,$dateTwo,'h'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(0, $dt->CompleteWeeks($dateOne,$dateTwo,'h'));

        // 2 weeks - Sunday to Sunday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-24');
        $this->assertEquals(2*7*24, $dt->CompleteWeeks($dateOne,$dateTwo,'h'));
    }
}
?>