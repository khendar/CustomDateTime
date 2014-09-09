<?php
	class CustomDateTime{
		/**
		* 	1. Find out the number of days between two date/time parameters.
	 	*/

		function DaysBetweenDates($firstDate, $secondDate){
			$this->validateDates(array($firstDate,$secondDate));
			// if(!$firstDate instanceof DateTime){
			// 		throw new InvalidArgumentException('Invalid Datetime (firstDate:'.$firstDate.')');
			// }
			// if(!$secondDate instanceof DateTime){
			// 	throw new InvalidArgumentException('Invalid Datetime (secondDate:'.$secondDate.')');
			// }

			$diff = $firstDate->diff($secondDate);
			return $diff->days;
		}
		/**
		*	2. Find out the number of weekdays between two date/time parameters.
	 	*/
		function WeekdaysBetweenDates($firstDate, $secondDate){
			$totalDays = $this->DaysBetweenDates($firstDate,$secondDate);
			$aWorkingDays = array(1,2,3,4,5);
			$workingDays = 0;
			if($firstDate < $secondDate){
				$fromDate = clone $firstDate;
				$toDate = clone $secondDate;
			}
			else{
				$fromDate = clone $secondDate;
				$toDate = clone $firstDate;
			}


			$interval = new DateInterval('P1D');
			$periods = new DatePeriod($fromDate, $interval, $toDate);
			foreach($periods as $period){
				if(!in_array($period->format('N'),$aWorkingDays)) continue;
				$workingDays++;
			}
			return $workingDays;
		}
		/**
		*	3. Find out the number of complete weeks between two date/time parameters.
	 	*/

		function CompleteWeeks ($firstDate, $secondDate){
			$totalDays = $this->DaysBetweenDates($firstDate,$secondDate);
			$diff = $firstDate->diff($secondDate);
			$completeWeeks = floor($totalDays/7);
			return $completeWeeks;
		}

		/**
		*	4. Accept a third parameter to convert the result of (1, 2 or 3) into one of seconds, minutes, hours, years.
	 	*/
		function DaysBetweenDatesMod($firstDate, $secondDate, $mod = 'd'){
			// $mod - 1=seconds, 2=minutes, 3=hours, 4=years

			if(!$firstDate instanceof DateTime){
					throw new Exception('Invalid Datetime (firstDate:'.$firstDate.')');
			}
			if(!$secondDate instanceof DateTime){
				throw new Exception('Invalid Datetime (secondDate:'.$secondDate.')');
			}
			$diff = $firstDate->diff($secondDate);
			return $this->convertInterval($diff,$mod);
		
		}

		function WeekdaysBetweenDatesMod($firstDate, $secondDate,$mod='d'){
			$totalDays = $this->DaysBetweenDates($firstDate,$secondDate);
			$aWorkingDays = array(1,2,3,4,5);
			$workingDays = 0;
			if($firstDate < $secondDate){
				$fromDate  = clone $firstDate;
				$toDate = clone $secondDate;
			}
			else{
				$fromDate = clone $secondDate;
				$toDate = clone $firstDate;
			}

			$interval = new DateInterval('P1D');
			$periods = new DatePeriod($fromDate, $interval, $toDate);
			foreach($periods as $period){
				if(!in_array($period->format('N'),$aWorkingDays)) continue;
				$workingDays++;
			}
			$interval = new DateInterval("P".$workingDays."D");
			return $this->convertInterval($interval,$mod);
		}

		function CompleteWeeksMod ($firstDate, $secondDate, $mod = 'd'){
			$totalDays = $this->DaysBetweenDates($firstDate,$secondDate);
			$diff = $firstDate->diff($secondDate);
			$completeWeeks = floor($totalDays/7);
			$interval = new DateInterval("P".$completeWeeks."W");
			return $this->convertInterval($interval,$mod);
		}

		/**
		*	Converts DateInterval into total seconds, minutes, hours, years or (default) days
		*	@param DateInterval $interval
		*	@param char $mod
		*	@return string
		*/
		function convertInterval($interval, $mod='d'){
			switch($mod){
				case 's':
					return floor($interval->d*86400 + $interval->h*3600 + $interval->i*60 + $interval->s);
				break;
			 	case 'm':
					return floor($interval->d*1440 + $interval->h*60 + $interval->i + $interval->s/60);
			 	break;
			 	case 'h':
					return floor($interval->d*24 + $interval->h + $interval->i/60 + $interval->s/3600);
			 	break;
			 	case 'y':
			 		if(!isset($interval->days))
				 		return floor($interval->d/365);
			 		else
				 		return floor($interval->days/365);
			 	break;
				default:
					return $interval->d;

			}
		}
		function validateDates($dates){
			print_r($dates);
			foreach($dates as $date){
				if(!$date instanceof DateTime){
					throw new InvalidArgumentException('Invalid Datetime ('.$date.')');
				}
			}
		}

		function GetTimezones(){
			$output = "";
			$timezones = DateTimeZone::listAbbreviations();
			$cities = array();
			foreach( $timezones as $key => $zones )
			{
			    foreach( $zones as $id => $zone )
			    {
			        /**
			         * Only get timezones explicitely not part of "Others".
			         * @see http://www.php.net/manual/en/timezones.others.php
			         */
			        if ( preg_match( '/^(America|Antartica|Arctic|Australia|Asia|Atlantic|Europe|Indian|Pacific)\//', $zone['timezone_id'] ) 
			    		&& $zone['timezone_id']) {	        	
			            $cities[] = $zone['timezone_id'];
			    	}
			    }
			}

			$cities = array_unique( $cities );

			// Sort by area/city name and return.
			return sort($cities);
		}
		/**
		*	5. Allow the specification of a timezone for comparison of input parameters from different timezones. 
		*/

	}

?>