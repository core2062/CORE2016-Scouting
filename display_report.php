<?php
include 'get_from_database.php';

// wait till it's posted
if(isset($_POST['search'])){

// Which team is being searched for
    $redTeam1 = trim($_POST['redTeam1']);
    $redTeam2 = trim($_POST['redTeam2']);
    $redTeam3 = trim($_POST['redTeam3']);
    $blueTeam4 = trim($_POST['blueTeam1']);
    $blueTeam5 = trim($_POST['blueTeam2']);
    $blueTeam6 = trim($_POST['blueTeam3']);

// Create team objects //
// access by $obj->var & $obj->method()
	$redTeam1Object = new teamReport($redTeam1);
	$redTeam2Object = new teamReport($redTeam2);
	$redTeam3Object = new teamReport($redTeam3);
	$blueTeam1Object = new teamReport($blueTeam1);
	$blueTeam2Object = new teamReport($blueTeam2);
	$blueTeam3Object = new teamReport($blueTeam3);
	$redTeam1Object->search_test();
	$redTeam2Object->search_test();
	$redTeam3Object->search_test();
	$blueTeam1Object->search_test();
	$blueTeam2Object->search_test();
	$blueTeam3Object->search_test();
	?>
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
			<td align="left"><b><?php echo $redTeam1Object->chevalDeFrise_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->chevalDeFrise_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->chevalDeFrise_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->chevalDeFrise_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->chevalDeFrise_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->chevalDeFrise_crosses() ?></b></td>
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
			<td align="left"><b><?php echo $redTeam1Object->sallyPort_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->sallyPort_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->sallyPort_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->sallyPort_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->sallyPort_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->sallyPort_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rock Wall Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->rockWall_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->rockWall_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->rockWall_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->rockWall_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->rockWall_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->rockWall_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rough Terrain Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->roughTerrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->roughTerrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->roughTerrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->roughTerrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->roughTerrain_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->roughTerrain_crosses() ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Bar Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->lowBar_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->lowBar_crosses() ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->lowBar_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->lowBar_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->lowBar_crosses() ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->lowBar_crosses() ?></b></td>
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
			<td align="left"><b>Auto Low Bar : Other Breach</b></td>
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

	</table>
