<?php
	class CustomDateTime{

		function DaysBetweenDates($firstDate, $secondDate, $mod = 'd'){
			$this->validateDates(array($firstDate,$secondDate));
			
			$diff = $firstDate->diff($secondDate);
			return $this->convertInterval($diff,$mod);
		
		}

		function WeekdaysBetweenDates($firstDate, $secondDate,$mod='d'){
			$this->validateDates(array($firstDate,$secondDate));
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

		function CompleteWeeks ($firstDate, $secondDate, $mod = 'd'){
			$totalDays = $this->DaysBetweenDates($firstDate,$secondDate,'d');
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

			$useDays = $interval->days==null?$interval->d:$interval->days;
			switch($mod){
				case 's':
					return floor($useDays*86400 + $interval->h*3600 + $interval->i*60 + $interval->s);
				break;
			 	case 'm':
					return floor($useDays*1440 + $interval->h*60 + $interval->i + $interval->s/60);
			 	break;
			 	case 'h':
					return floor($useDays*24 + $interval->h + $interval->i/60 + $interval->s/3600);
			 	break;
			 	case 'y':
			 		return floor($useDays/365);
			 	break;
				default:
					return $useDays;

			}
		}
		function validateDates($dates){
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
			sort($cities);	
			return $cities;
		}

	}
