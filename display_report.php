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
			<td align="left"><b><?php echo $redTeam1Object->portcullis ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->portcullis ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->portcullis ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->portcullis ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->portcullis ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->portcullis ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Cheval de Frise</b></td>
			<td align="left"><b><?php echo $redTeam1Object->chevalDeFrise ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->chevalDeFrise ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->chevalDeFrise ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->chevalDeFrise ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->chevalDeFrise ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->chevalDeFrise ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Moat Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->moat ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->moat ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->moat ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->moat ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->moat ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->moat ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rampart Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->ramparts ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->ramparts ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->ramparts ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->ramparts ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->ramparts ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->ramparts ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Drawbridge Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->drawbridge ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->drawbridge ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->drawbridge ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->drawbridge ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->drawbridge ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->drawbridge ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Sally Port Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->sallyPort ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->sallyPort ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->sallyPort ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->sallyPort ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->sallyPort ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->sallyPort ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rock Wall Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->rockWall ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->rockWall ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->rockWall ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->rockWall ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->rockWall ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->rockWall ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Rough Terrain Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->roughTerrain ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->roughTerrain ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->roughTerrain ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->roughTerrain ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->roughTerrain ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->roughTerrain ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Bar Crosses</b></td>
			<td align="left"><b><?php echo $redTeam1Object->lowBar ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->lowBar ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->lowBar ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->lowBar ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->lowBar ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->lowBar ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>High Goal Shots Made</b></td>
			<td align="left"><b><?php echo $redTeam1Object->highGoalAccuracyFraction ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->highGoalAccuracyFraction ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->highGoalAccuracyFraction ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->highGoalAccuracyFraction ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->highGoalAccuracyFraction ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->highGoalAccuracyFraction ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>High Goal Accuracy</b></td>
			<td align="left"><b><?php echo $redTeam1Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->highGoalAccuracyPercent ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Goal Shots Made</b></td>
			<td align="left"><b><?php echo $redTeam1Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->lowGoalAccuracyPercent ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Goal Accuracy</b></td>
			<td align="left"><b><?php echo $redTeam1Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->lowGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->lowGoalAccuracyPercent ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Challenging</b></td>
			<td align="left"><b><?php echo $redTeam1Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->highGoalAccuracyPercent ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Scaling</b></td>
			<td align="left"><b><?php echo $redTeam1Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->highGoalAccuracyPercent ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->highGoalAccuracyPercent ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Highest Auto Movement</b></td>
			<td align="left"><b><?php echo $redTeam1Object->highestAutoMovement ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->highestAutoMovement ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->highestAutoMovement ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->highestAutoMovement ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->highestAutoMovement ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->highestAutoMovement ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Auto Low Bar : Other Breach</b></td>
			<td align="left"><b><?php echo $redTeam1Object->autoBreachLowBar ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->autoBreachLowBar ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->autoBreachLowBar ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->autoBreachLowBar ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->autoBreachLowBar ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->autoBreachLowBar ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>Low Goals Made in Auto</b></td>
			<td align="left"><b><?php echo $redTeam1Object->autoLowGoals ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->autoLowGoals ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->autoLowGoals ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->autoLowGoals ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->autoLowGoals ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->autoLowGoals ?></b></td>
		</tr>
		<tr>
			<td align="left"><b>High Goals Made in Auto</b></td>
			<td align="left"><b><?php echo $redTeam1Object->autoHighGoals ?></b></td>
			<td align="left"><b><?php echo $redTeam2Object->autoHighGoals ?></b></td>
			<td align="left"><b><?php echo $redTeam3Object->autoHighGoals ?></b></td>
			<td align="left"><b><?php echo $blueTeam1Object->autoHighGoals ?></b></td>
			<td align="left"><b><?php echo $blueTeam2Object->autoHighGoals ?></b></td>
			<td align="left"><b><?php echo $blueTeam3Object->autoHighGoals ?></b></td>
		</tr>

	</table>
