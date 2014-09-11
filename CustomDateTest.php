<?php
require "CustomDateTime.class.php";
/**
*   PHPUnit Testing Class
*/
class CustomDateTest extends PHPUnit_Framework_TestCase{

    // Testing DaysBetweenDates

    /**
    * @expectedException        InvalidArgumentException
    */
	// public function testDaysBetweenDates(){
 //        $dt = new CustomDateTime();

	//     // 0 Days
 //        $dateOne = new DateTime('2014-08-1');
 //        $dateTwo = new DateTime('2014-08-1');
 //        $this->assertEquals(0, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //        // 1 Day
 //        $dateOne = new DateTime('2014-08-1');
 //        $dateTwo = new DateTime('2014-08-2');
 //        $this->assertEquals(1, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //        // Reversed date order
 //        $dateOne = new DateTime('2014-08-2');
 //        $dateTwo = new DateTime('2014-08-1');
 //        $this->assertEquals(1, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //        // 1 week
 //        $dateOne = new DateTime("2015-08-07");
 //        $dateTwo = new DateTime('2015-08-14');
 //        $this->assertEquals(7, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //        // 1 month
 //        $dateOne = new DateTime("2015-09-01");
 //        $dateTwo = new DateTime('2015-08-01');
 //        $this->assertEquals(31, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //        // 1 year
 //        $dateOne = new DateTime('2015-08-01');
 //        $dateTwo = new DateTime('2014-08-01');
 //        $this->assertEquals(365, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //        // 1 leap year 
 //        $dateOne = new DateTime('2015-08-1');
 //        $dateTwo = new DateTime('2016-08-1');
 //        $this->assertEquals(366, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //        // Invalid datetime - throws InvalidArgumentException 
 //        $dateOne = "2015-09-01";
 //        $dateTwo = new DateTime('2016-08-1');
 //        $this->assertEquals(366, $dt->DaysBetweenDates($dateOne,$dateTwo));

 //    }

 //    // Testing WeekdaysBetweenDates
 //    public function testWeekdaysBetweenDates(){
 //        $dt = new CustomDateTime();

 //        // Sunday to Sunday
 //        $dateOne = new DateTime('2014-08-2');
 //        $dateTwo = new DateTime('2014-08-9');
 //        $this->assertEquals(5, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));

 //        // Reversed date order
 //        $dateOne = new DateTime('2014-08-9');
 //        $dateTwo = new DateTime('2014-08-2');
 //        $this->assertEquals(5, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));

 //        // 2 weeks - Sunday to Saturday
 //        $dateOne = new DateTime('2014-08-10');
 //        $dateTwo = new DateTime('2014-08-23');
 //        $this->assertEquals(10, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));

 //        // Monday to Friday
 //        $dateOne = new DateTime('2014-08-04');
 //        $dateTwo = new DateTime('2014-08-08');
 //        $this->assertEquals(4, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));

 //        // 260 working days per year if year starts on a weekend
 //        $dateOne = new DateTime('2014-08-02');
 //        $dateTwo = new DateTime('2015-08-02');
 //        $this->assertEquals(260, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));

 //        // 261 working days per year if year starts on a weekday
 //        $dateOne = new DateTime('2014-08-04');
 //        $dateTwo = new DateTime('2015-08-04');
 //        $this->assertEquals(261, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));

 //        // 261 working days per year if year starts on a weekend and spans Feb 29th
 //        $dateOne = new DateTime('2015-03-01');
 //        $dateTwo = new DateTime('2016-03-01');
 //        $this->assertEquals(261, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));

 //        // 262 working days per leap year if year starts on a weekday and spans Feb 29th
 //        $dateOne = new DateTime('2015-03-04');
 //        $dateTwo = new DateTime('2016-03-04');
 //        $this->assertEquals(262, $dt->WeekdaysBetweenDates($dateOne,$dateTwo));
 //    }

 //    // Testing CompleteWeeks
 //    public function testCompleteWeeks(){
 //        $dt = new CustomDateTime();

 //        $dateOne = new DateTime('2014-08-1');
 //        $dateTwo = new DateTime('2014-08-1');
 //        $this->assertEquals(0, $dt->CompleteWeeks($dateOne,$dateTwo));

 //        // 1 week
 //        $dateOne = new DateTime('2014-08-1');
 //        $dateTwo = new DateTime('2014-08-8');
 //        $this->assertEquals(1, $dt->CompleteWeeks($dateOne,$dateTwo));

 //        // 1 week reversed date order
 //        $dateOne = new DateTime('2014-08-8');
 //        $dateTwo = new DateTime('2014-08-1');
 //        $this->assertEquals(1, $dt->CompleteWeeks($dateOne,$dateTwo));

 //        // 4 week per month
 //        $dateOne = new DateTime('2014-08-1');
 //        $dateTwo = new DateTime('2014-08-31');
 //        $this->assertEquals(4, $dt->CompleteWeeks($dateOne,$dateTwo));

 //        // 52 weeks per year
 //        $dateOne = new DateTime('2014-08-1');
 //        $dateTwo = new DateTime('2013-07-31');
 //        $this->assertEquals(52, $dt->CompleteWeeks($dateOne,$dateTwo));
 //    }

    //Testing DaysBetweenDatesMod in seconds
    public function testDaysBetweenDatesModSeconds(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:01');
        $this->assertEquals(1, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'s'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:01:00');
        $this->assertEquals(60, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'s'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 08:00:00');
        $this->assertEquals(3600, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'s'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:30');
        $this->assertEquals(30, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'s'));
    }
    //Testing DaysBetweenDatesMod in minutes
    public function testDaysBetweenDatesModMinutes(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:01');
        $this->assertEquals(0, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'m'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:01:00');
        $this->assertEquals(1, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'m'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 08:00:00');
        $this->assertEquals(60, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'m'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:30:00');
        $this->assertEquals(30, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'m'));
    }

    //Testing DaysBetweenDatesMod in Hours
    public function testDaysBetweenDatesModHours(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:01');
        $this->assertEquals(0, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'h'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:01:00');
        $this->assertEquals(0, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'h'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 08:00:00');
        $this->assertEquals(1, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'h'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-2 07:00:00');
        $this->assertEquals(24, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'h'));
    }
    //Testing DaysBetweenDatesMod in Years
    public function testDaysBetweenDatesModYears(){
        $dt = new CustomDateTime();

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2014-08-1 07:00:00');
        $this->assertEquals(0, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'y'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2015-08-1 07:00:00');
        $this->assertEquals(1, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'y'));

        $dateOne = new DateTime('2014-08-1 07:00:00');
        $dateTwo = new DateTime('2024-08-1 08:00:00');
        $this->assertEquals(10, $dt->DaysBetweenDatesMod($dateOne,$dateTwo,'y'));

    }

    //Testing WeekdaysBetweenDatesMod in seconds
    public function testWeekdaysBetweenDatesModSeconds(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(5*24*60*60, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'s'));

        // Reversed date order
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(1*24*60*60, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'s'));

        // 2 weeks - Sunday to Saturday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-23');
        $this->assertEquals(10*24*60*60, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'s'));

    }

    //Testing WeekdaysBetweenDatesMod in minutes
    public function testWeekdaysBetweenDatesModMinutes(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(5*24*60, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'m'));

        // Reversed date order
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(1*24*60, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'m'));

        // 2 weeks - Sunday to Saturday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-23');
        $this->assertEquals(10*24*60, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'m'));

    }

    //Testing WeekdaysBetweenDatesMod in hours
    public function testWeekdaysBetweenDatesModHours(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(5*24, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'h'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(1*24, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'h'));

        // 2 weeks - Sunday to Saturday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-23');
        $this->assertEquals(10*24, $dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'h'));
    }

    //Testing CompleteWeeksMod in seconds
    public function testWeeksBetweenDatesModSeconds(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(1*7*24*60*60, $dt->CompleteWeeksMod($dateOne,$dateTwo,'s'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(0, $dt->CompleteWeeksMod($dateOne,$dateTwo,'s'));

        // 2 weeks - Sunday to Sunday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-24');
        $this->assertEquals(2*7*24*60*60, $dt->CompleteWeeksMod($dateOne,$dateTwo,'s'));
    }

    //Testing CompleteWeeksMod in minutes
    public function testWeeksBetweenDatesModMinutes(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(1*7*24*60, $dt->CompleteWeeksMod($dateOne,$dateTwo,'m'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(0, $dt->CompleteWeeksMod($dateOne,$dateTwo,'m'));

        // 2 weeks - Sunday to Sunday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-24');
        $this->assertEquals(2*7*24*60, $dt->CompleteWeeksMod($dateOne,$dateTwo,'m'));
    }

    //Testing CompleteWeeksMod in hours
    public function testWeeksBetweenDatesModHours(){
        $dt = new CustomDateTime();

        // Sunday to Sunday
        $dateOne = new DateTime('2014-08-3');
        $dateTwo = new DateTime('2014-08-10');
        $this->assertEquals(1*7*24, $dt->CompleteWeeksMod($dateOne,$dateTwo,'h'));

        // Monday to Tuesday
        $dateOne = new DateTime('2014-08-4');
        $dateTwo = new DateTime('2014-08-5');
        $this->assertEquals(0, $dt->CompleteWeeksMod($dateOne,$dateTwo,'h'));

        // 2 weeks - Sunday to Sunday
        $dateOne = new DateTime('2014-08-10');
        $dateTwo = new DateTime('2014-08-24');
        $this->assertEquals(2*7*24, $dt->CompleteWeeksMod($dateOne,$dateTwo,'h'));
    }
}
?>