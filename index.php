<!DOCTYPE html>
<?php
	require "CustomDateTime.class.php";
	$dt = new CustomDateTime();
	$defaultDateTime = date('Y/m/d H:i',time());
	$defaultTimezone = "Australia/Perth";
	$aTimeZones = $dt->GetTimezones();
?>
<html lang="en">

<head>
	<title>CustomDateTime Demo</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="css/jquery.datetimepicker.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<script src="js/scripts.js"></script>
</head>
<body>
	<h1>CustomDateTime Demo</h1>
	<div class="dateForm">
		<form method="post" action="index.php">
			<div class="row">
				<label>First Date:</label>
				<input type="text" name="dateOne" id="dateOne" value="<?php echo (isset($_POST['dateOne'])?  $_POST['dateOne']:$defaultDateTime); ?>" class="date">
					<select name="dateOneTimezone">
						<?php
						 	foreach($aTimeZones as $timezone){
						 		if(isset($_POST['dateOneTimezone']) && $_POST['dateOneTimezone'] == $timezone){
						 			$selected = ' selected';
						 		}
						 		elseif(!isset($_POST['dateOneTimezone']) && $timezone == $defaultTimezone){
									$selected = ' selected';
								}
						 		else{
							 		$selected = '';
						 		}
						 		echo '<option' . $selected .'>' .$timezone.'</option>';
						 	}

						 ?>
					</select>

			</div>
			<div class="row">
				<label>Second Date:</label>
				<input type="text"  name="dateTwo" id="dateTwo" value="<?php echo (isset($_POST['dateTwo'])?  $_POST['dateTwo']:$defaultDateTime); ?>" class="date">
					<select name="dateTwoTimezone">
						<?php
						 	foreach($aTimeZones as $timezone){
						 		if(isset($_POST['dateTwoTimezone']) && $_POST['dateTwoTimezone'] == $timezone){
						 			$selected = ' selected';
						 		}
						 		elseif(!isset($_POST['dateTwoTimezone']) && $timezone == $defaultTimezone){
									$selected = ' selected';
								}
						 		else{
							 		$selected = '';
						 		}
						 		echo '<option' . $selected .'>' .$timezone.'</option>';
						 	}

						 ?>
					</select>

			</div>
			<div class="row"><label for="submit"></label><input type="submit" id="submit" name="submit" value="Compare">

			</div>
		</form>
	</div>
<?php
	if(isset($_POST['submit'])){

		$dateOne = new DateTime($_POST['dateOne'],new DateTimeZone($_POST['dateOneTimezone']));
		$dateTwo = new DateTime($_POST['dateTwo'],new DateTimeZone($_POST['dateTwoTimezone']));
		$formatString = 'Y-m-d H:i:s T';
		$diff = $dt->DaysBetweenDates($dateOne,$dateTwo ,'d') ;
		try{
			echo '<h2>Days Between Dates</h2>';
			echo '<h3>'. $dateOne->format($formatString) . ' to ' . $dateTwo->format($formatString).'</h3>';
			echo '<ol>';
			echo '<li>Seconds = '.$dt->DaysBetweenDates($dateOne,$dateTwo,'s' ) .' seconds</li>';
			echo '<li>Minutes = '.$dt->DaysBetweenDates($dateOne,$dateTwo,'m' ) .' minutes</li>';
			echo '<li>Hours = '.$dt->DaysBetweenDates($dateOne,$dateTwo,'h' ) .' hours</li>';
			echo '<li>Days = '.$dt->DaysBetweenDates($dateOne,$dateTwo ) .' days</li>';
			echo '<li>Years = '.$dt->DaysBetweenDates($dateOne,$dateTwo,'y' ) .' years</li>';
			echo "</ol>";

		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}	
		try{
			echo '<h2>Weekdays Between Dates</h2>';
			echo '<h3>'. $dateOne->format($formatString) . ' to ' . $dateTwo->format($formatString).'</h3>';
			echo '<ol>';
			echo '<li>Seconds = '.$dt->WeekdaysBetweenDates($dateOne,$dateTwo,'s' ) .' seconds</li>';
			echo '<li>Minutes = '.$dt->WeekdaysBetweenDates($dateOne,$dateTwo,'m' ) .' minutes</li>';
			echo '<li>Hours = '.$dt->WeekdaysBetweenDates($dateOne,$dateTwo,'h' ) .' hours</li>';
			echo '<li>Days = '.$dt->WeekdaysBetweenDates($dateOne,$dateTwo ) .' days</li>';
			echo '<li>Years = '.$dt->WeekdaysBetweenDates($dateOne,$dateTwo,'y' ) .' years</li>';
			echo '</ol>';

		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}	
		try{
			echo '<h2>Complete Weeks</h2>';
			echo '<h3>'. $dateOne->format($formatString) . ' to ' . $dateTwo->format($formatString).'</h3>';
			echo '<ol>';
			echo '<li>Seconds = '.$dt->CompleteWeeks($dateOne,$dateTwo,'s' ) .' seconds</li>';
			echo '<li>Minutes = '.$dt->CompleteWeeks($dateOne,$dateTwo,'m' ) .' minutes</li>';
			echo '<li>Hours = '.$dt->CompleteWeeks($dateOne,$dateTwo,'h' ) .' hours</li>';
			echo '<li>Days = '.$dt->CompleteWeeks($dateOne,$dateTwo ) .' days</li>';
			echo '<li>Years = '.$dt->CompleteWeeks($dateOne,$dateTwo,'y' ) .' years</li>';
			echo '</ol>';
		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}	
	}
