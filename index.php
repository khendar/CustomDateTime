<?php
	require "CustomDateTime.class.php";
	$dt = new CustomDateTime();
	$defaultTimezone = "Australia/Adelaide";

?>
<html>
<head>
	<link rel="stylesheet" href="css/jquery.datetimepicker.css">
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/jquery.datetimepicker.js"></script>
	<script>
		$(function(){
			$(".date").datetimepicker();
		});

	</script>	
	<style>
		*,body,html{
			font-family:helvetica;
			font-size:12px;
		}
		label{
			display:inline-block;
			width:100px;
			font-weight:bold;
		}
		input[type="text"],select{
			padding:10px;
		}
	</style>
</head>
<body>
	<form method="post" action="">
		<label for="dateOne">First Date:</label><input type="text" class="date" name="dateOne" value="<?php echo (isset($_POST['dateOne'])?  $_POST['dateOne']:""); ?>">
		<select name="dateOneTimezone"><?php echo $dt->GetTimezones((isset($_POST['dateOneTimezone'])?$_POST['dateOneTimezone']:$defaultTimezone));?></select><br/>
		<label for="dateTwo">Second Date:</label><input type="text" class="date" name="dateTwo" value="<?php echo (isset($_POST['dateTwo'])?  $_POST['dateTwo']:""); ?>">
		<select name="dateTwoTimezone"><?php echo $dt->GetTimezones((isset($_POST['dateTwoTimezone'])?$_POST['dateTwoTimezone']:$defaultTimezone));?></select><br/>
		
		<input type="submit" name="submit" value="Compare">
	</form>
<?php
	if(isset($_POST['submit'])){

		$dateOne = new DateTime($_POST['dateOne'],new DateTimeZone($_POST['dateOneTimezone']));
		$dateTwo = new DateTime($_POST['dateTwo'],new DateTimeZone($_POST['dateTwoTimezone']));
		$formatString = 'Y-m-d H:i:s T';
		try{
			echo 'Difference Between '. $dateOne->format('Y-m-d T') . ' and ' . $dateTwo->format('Y-m-d T'). ' is: '.$dt->DaysBetweenDates($dateOne,$dateTwo) .' days</br>';
		}
		catch (Exception $e){ print ('Caught Exception: ' . $e->getMessage()."\n");}
		echo '</br>';
		try{
			echo 'Week Days Between '. $dateOne->format('Y-m-d T') . ' and ' . $dateTwo->format('Y-m-d T'). ' is: '.$dt->WeekdaysBetweenDates($dateOne,$dateTwo) .' days</br>';
		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}
		
		echo '</br>';
		try{
			echo 'Weeks Between '. $dateOne->format('Y-m-d T') . ' and ' . $dateTwo->format('Y-m-d T'). ' is: '.$dt->CompleteWeeks($dateOne,$dateTwo) .' weeks</br>';
		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}
		echo '</br>';
		try{
			echo 'Seconds Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->DaysBetweenDatesMod($dateOne,$dateTwo,'s' ) .' seconds</br>';
			echo 'Minutes Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->DaysBetweenDatesMod($dateOne,$dateTwo,'m' ) .' minutes</br>';
			echo 'Hours Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->DaysBetweenDatesMod($dateOne,$dateTwo,'h' ) .' hours</br>';
			echo 'Days Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->DaysBetweenDatesMod($dateOne,$dateTwo ) .' days</br>';
			echo 'Years Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->DaysBetweenDatesMod($dateOne,$dateTwo,'y' ) .' years</br>';

		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}	
		echo '</br>';
		try{
			echo 'Seconds Weekdays Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'s' ) .' seconds</br>';
			echo 'Minutes Weekdays Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'m' ) .' minutes</br>';
			echo 'Hours Weekdays Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'h' ) .' hours</br>';
			echo 'Days Weekdays Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo ) .' days</br>';
			echo 'Years Weekdays  Between Dates Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->WeekdaysBetweenDatesMod($dateOne,$dateTwo,'y' ) .' years</br>';

		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}	
		echo '</br>';
		try{
			echo 'Seconds Weeks Between Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->CompleteWeeksMod($dateOne,$dateTwo,'s' ) .' seconds</br>';
			echo 'Minutes Weeks Between Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->CompleteWeeksMod($dateOne,$dateTwo,'m' ) .' minutes</br>';
			echo 'Hours Weeks Between Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->CompleteWeeksMod($dateOne,$dateTwo,'h' ) .' hours</br>';
			echo 'Days Weeks Between Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->CompleteWeeksMod($dateOne,$dateTwo ) .' days</br>';
			echo 'Years Weeks Between Mod '. $dateOne->format($formatString) . ' and ' . $dateTwo->format($formatString). ' is: '.$dt->CompleteWeeksMod($dateOne,$dateTwo,'y' ) .' years</br>';

		}
		catch (Exception $e){print ('Caught Exception: ' . $e->getMessage()."\n");}	
	}
	

	
?>