<?php
include 'get_from_database.php';

// wait till it's posted
//if(isset($_POST['submit'])){

// Which team is being searched for
    $redTeam1 = trim($_POST['RedTeam1']);
    $redTeam2 = trim($_POST['RedTeam2']);
    $redTeam3 = trim($_POST['RedTeam3']);
    $blueTeam1 = trim($_POST['BlueTeam1']);
    $blueTeam2 = trim($_POST['BlueTeam2']);
    $blueTeam3 = trim($_POST['BlueTeam3']);
    

// Create team objects //
// access by $obj->var & $obj->method()
	$redTeam1Object = new teamReport($redTeam1);
	$redTeam2Object = new teamReport($redTeam2);
	$redTeam3Object = new teamReport($redTeam3);
	$blueTeam1Object = new teamReport($blueTeam1);
	$blueTeam2Object = new teamReport($blueTeam2);
	$blueTeam3Object = new teamReport($blueTeam3);
	if($redTeam1Object->check_error() || $redTeam2Object->check_error() || $redTeam3Object->check_error() || 
	$blueTeam1Object->check_error() || $blueTeam2Object->check_error() || $blueTeam3Object->check_error()){
		echo "DATA NOT SUBMITED!<br>";
	}
?>
<link href="style.css" rel="stylesheet" type="text/css" />
	<table>
		<tr>
			<td align="left"><b>Allicance</b></td>
			<td align="left"><b>RED</b></td>
			<td align="left"><b>RED</b></td>
			<td align="left"><b>RED</b></td>
			<td align="left"><b>BLUE</b></td>
			<td align="left"><b>BLUE</b></td>
			<td align="left"><b>BLUE</b></td>
		</tr>
		<tr>
			<td align="left"><b>Team</b></td>
			<td align="left"><b><?php echo $redTeam1Object->team ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->team ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->team ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->team ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->team ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->team ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Portcullis Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->portcullis_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->portcullis_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->portcullis_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->portcullis_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->portcullis_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->portcullis_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Cheval de Frise</b></td>
			<td align="left"><b><?php echo $redTeam1Object->cheval_de_frise_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->cheval_de_frise_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->cheval_de_frise_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->cheval_de_frise_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->cheval_de_frise_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->cheval_de_frise_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Moat Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->moat_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->moat_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->moat_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->moat_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->moat_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->moat_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rampart Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->ramparts_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->ramparts_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->ramparts_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->ramparts_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->ramparts_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->ramparts_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Drawbridge Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->drawbridge_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->drawbridge_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->drawbridge_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->drawbridge_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->drawbridge_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->drawbridge_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Sally Port Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->sally_port_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->sally_port_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->sally_port_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->sally_port_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->sally_port_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->sally_port_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rock Wall Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->rockwall_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->rockwall_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->rockwall_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->rockwall_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->rockwall_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->rockwall_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rough Terrain Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->rough_terrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->rough_terrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->rough_terrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->rough_terrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->rough_terrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->rough_terrain_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Bar Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->low_bar_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->low_bar_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->low_bar_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->low_bar_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->low_bar_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->low_bar_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Average High Goal Shots Made</b></td>
			<td align="left"><b><?php echo $redTeam1Object->avg_high_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->avg_high_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->avg_high_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->avg_high_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->avg_high_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->avg_high_goal_shots_per_match() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>High Goal Accuracy</b></td>
			<td align="left"><b><?php echo $redTeam1Object->high_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->high_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->high_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->high_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->high_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->high_goal_accuracy() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Average Low Goal Shots Made</b></td>
			<td align="left"><b><?php echo $redTeam1Object->avg_low_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->avg_low_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->avg_low_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->avg_low_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->avg_low_goal_shots_per_match() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->avg_low_goal_shots_per_match() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Goal Accuracy</b></td>
			<td align="left"><b><?php echo $redTeam1Object->low_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->low_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->low_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->low_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->low_goal_accuracy() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->low_goal_accuracy() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Challenging</b></td>
			<td align="left"><b><?php echo $redTeam1Object->times_challenged() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->times_challenged() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->times_challenged() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->times_challenged() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->times_challenged() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->times_challenged() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Scaling</b></td>
			<td align="left"><b><?php echo $redTeam1Object->times_scaled() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->times_scaled() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->times_scaled() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->times_scaled() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->times_scaled() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->times_scaled() ?></b></td>
		</tr>
		 <tr>
			<td align="left"><b>Highest Auto Movement</b></td>
			<td align="left"><b><?php echo $redTeam1Object->highest_auto_movement() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->highest_auto_movement() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->highest_auto_movement() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->highest_auto_movement() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->highest_auto_movement() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->highest_auto_movement() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Auto Low Bar : Other Cross</b></td>
			<td align="left"><b><?php echo $redTeam1Object->auto_times_breached() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->auto_times_breached() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->auto_times_breached() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->auto_times_breached() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->auto_times_breached() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->auto_times_breached() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Goals Made in Auto</b></td>
			<td align="left"><b><?php echo $redTeam1Object->auto_low_goals() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->auto_low_goals() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->auto_low_goals() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->auto_low_goals() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->auto_low_goals() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->auto_low_goals() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>High Goals Made in Auto</b></td>
			<td align="left"><b><?php echo $redTeam1Object->auto_high_goals() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->auto_high_goals() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->auto_high_goals() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->auto_high_goals() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->auto_high_goals() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->auto_high_goals() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Yellow Card : Red Card</b></td>
			<td align="left"><b><?php echo $redTeam1Object->report_cards() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->report_cards() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->report_cards() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->report_cards() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->report_cards() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->report_cards() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Disabled</b></td>
			<td align="left"><b><?php echo $redTeam1Object->times_disabled() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->times_disabled() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->times_disabled() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->times_disabled() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->times_disabled() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->times_disabled() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Comments</b></td>
			<td align="left"><b><?php echo $redTeam1Object->all_comments() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->all_comments() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->all_comments() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->all_comments() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->all_comments() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->all_comments() ?></b></td>
		</tr>
		<?php
		if(isset($_POST['paragraphReport'])){
			$redTeam1 = trim($_POST['RedTeam1']);
		    $redTeam2 = trim($_POST['RedTeam2']);
		    $redTeam3 = trim($_POST['RedTeam3']);
		    $blueTeam1 = trim($_POST['BlueTeam1']);
		    $blueTeam2 = trim($_POST['BlueTeam2']);
		    $blueTeam3 = trim($_POST['BlueTeam3']);
	    	require 'paragraph_report.php';

	    	$redTeam1Objectpr = new showAdvancedReport($redTeam1, $OPRReport);
			$redTeam2Objectpr = new showAdvancedReport($redTeam2, $OPRReport);
			$redTeam3Objectpr = new showAdvancedReport($redTeam3, $OPRReport);
			$blueTeam1Objectpr = new showAdvancedReport($blueTeam1, $OPRReport);
			$blueTeam2Objectpr = new showAdvancedReport($blueTeam2, $OPRReport);
			$blueTeam3Objectpr = new showAdvancedReport($blueTeam3, $OPRReport);
			echo "
			<tr>
				<td><b>Overall Competition Rank</b></td>
				<td><b>{$redTeam1Objectpr->overall_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->overall_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->overall_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->overall_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->overall_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->overall_rank()}</b></td>
			</tr>";
			echo "
			<tr>
				<td><b>Primary Shooter Type & Rank</b></td>
				<td><b>{$redTeam1Objectpr->display_shooter_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->display_shooter_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->display_shooter_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->display_shooter_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->display_shooter_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->display_shooter_rank()}</b></td>
			</tr>";
			echo "
			<tr>
				<td><b>Auto Rank</b></td>
				<td><b>{$redTeam1Objectpr->display_auto_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->display_auto_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->display_auto_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->display_auto_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->display_auto_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->display_auto_rank()}</b></td>
			</tr>";
			echo "
			<tr>
				<td><b>WORST at Defence: </b></td>
				<td><b>{$redTeam1Objectpr->display_worst_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->display_worst_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->display_worst_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->display_worst_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->display_worst_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->display_worst_rank()}</b></td>
			</tr>";
			echo "
			<tr>
				<td><b>Best at Defence: </b></td>
				<td><b>{$redTeam1Objectpr->display_top_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->display_top_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->display_top_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->display_top_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->display_top_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->display_top_rank()}</b></td>
			</tr>";
			echo "
			<tr>
				<td><b>Second Best at Defence: </b></td>
				<td><b>{$redTeam1Objectpr->display_second_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->display_second_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->display_second_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->display_second_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->display_second_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->display_second_rank()}</b></td>
			</tr>";
			echo "
			<tr>
				<td><b>Third Best at Defence: </b></td>
				<td><b>{$redTeam1Objectpr->display_third_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->display_third_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->display_third_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->display_third_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->display_third_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->display_third_rank()}</b></td>
			</tr>";
			echo "
			<tr>
				<td><b>Climber Rank: </b></td>
				<td><b>{$redTeam1Objectpr->display_scaler_rank()}</b></td>
				<td><b>{$redTeam2Objectpr->display_scaler_rank()}</b></td>
				<td><b>{$redTeam3Objectpr->display_scaler_rank()}</b></td>
				<td><b>{$blueTeam1Objectpr->display_scaler_rank()}</b></td>
				<td><b>{$blueTeam2Objectpr->display_scaler_rank()}</b></td>
				<td><b>{$blueTeam3Objectpr->display_scaler_rank()}</b></td>
			</tr>";






	    	/*
	    	$redTeam1Report = report($redTeam1, $OPRReport);
	    	$redTeam2Report = report($redTeam2, $OPRReport);
	    	$redTeam3Report = report($redTeam3, $OPRReport);
	    	$blueTeam1Report =  report($blueTeam1, $OPRReport);
	    	$blueTeam2Report = report($blueTeam2, $OPRReport);
	    	$blueTeam3Report = report($blueTeam3, $OPRReport);
			echo "
			<tr>
				<td><b>Relative Report</b></td>
				<td><b>{$redTeam1Report}</b></td>
				<td><b>{$redTeam2Report}</b></td>
				<td><b>{$redTeam3Report}</b></td>
				<td><b>{$blueTeam1Report}</b></td>
				<td><b>{$blueTeam2Report}</b></td>
				<td><b>{$blueTeam3Report}</b></td>

			</tr>";
			*/
		}	
		?>

	</table>
