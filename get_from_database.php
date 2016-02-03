<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// wait till it's posted
if(isset($_POST['search'])){

// Which team is being searched for
    $team = trim($_POST['team']);

// Creates querys for the database
//do all calculations based on these query's then display data
	$allQuery = "SELECT autoDefence, highGoalAutoShotsMade, lowGoalAutoShotsMade, categoryA, categoryAScore, categoryB, categoryBScore, categoryC, categoryCScore, categoryD, categoryDScore, lowBarScore, lowGoalShots, highGoalShots, comments FROM match WHERE team = $team";
	$portcullisQuery = "SELECT categoryAScore FROM match WHERE team = $team AND categoryA ='Portcullis'";
	$chevalDeFriseQuery = "SELECT SUM(categoryAScore) AS ChevalCrosses FROM match WHERE team = $team AND categoryA ='Cheval de Frise'";
	$moatQuery = "SELECT SUM(categoryBScore) AS MoatCrosses FROM match WHERE team = $team AND categoryB ='Moat'";
	$rampartsQuery = "SELECT SUM(categoryBScore) AS RampartCrosses FROM match WHERE team = $team AND categoryB ='Ramparts'";
	$drawbridgeQuery = "SELECT SUM(categoryCScore) AS DrawbridgeCrosses FROM match WHERE team = $team AND categoryC ='Drawbridge'";
	$sallyPortQuery = "SELECT SUM(categoryCScore) AS SallyPortCrosses FROM match WHERE team = $team AND categoryC ='Sally Port'";
	$rockWallQuery = "SELECT SUM(categoryDScore) AS RockWallCrosses FROM match WHERE team = $team AND categoryD ='Rock Wall'";
	$roughTerrainQuery = "SELECT SUM(categoryDScore) AS RoughTerrainCrosses FROM match WHERE team = $team AND categoryD ='Rough Terrain'";
	$lowBarQuery = "SELECT SUM(lowBarScore) AS LowBarCrosses FROM match WHERE team = $team";
	$lowGoalHitsQuery = "SELECT SUM(lowGoalShots) AS LowGoalHits FROM match WHERE team = $team";
	$lowGoalMissesQuery = "SELECT SUM(missedLowGoalShots) AS LowGoalMisses FROM match WHERE team = $team";
	$highGoalHitsQuery = "SELECT SUM(highGoalShots) AS HighGoalHits FROM match WHERE team = $team";
	$highGoalMissesQuery = "SELECT SUM(highGoalShots) AS HighGoalMisses FROM match WHERE team = $team";
	$numMatchesQuery = "SELECT team FROM match WHERE team = $team";
	

// Query Calculations //

// Low goal Accuracy Calculations //	
	$lgha = mysql_fetch_assoc($lowGoalHitsQuery); 
	$lowGoalHits = $lgha['LowGoalHits']; // Num low goal shots made
	$lgma = mysql_fetch_assoc($lowGoalMissesQuery); 
	$lowGoalMisses = $lgma['LowGoalMisses'];
	$lowGoalAccuracy = (($lowGoalHits/($lowGoalHits+$lowGoalMisses))*100); //double value of hit ratio
	$lowGoalAccuracy = round($lowGoalAccuracy, 1, PHP_ROUND_HALF_UP);
// High Goal Accuracy Calculations //
	$hgha = mysql_fetch_assoc($highGoalHitsQuery); 
	$highGoalHits = $lgha['HighGoalHits']; // Num high goal shots made
	$hgma = mysql_fetch_assoc($hightGoalMissesQuery); 
	$highGoalMisses = $lgma['HighGoalMisses'];
	$highGoalAccuracy = (($highGoalHits/($highGoalHits+$highGoalMisses))*100); //double value of hit ratio
	$highGoalAccuracy = round($highGoalAccuracy, 1, PHP_ROUND_HALF_UP);

	//todo
	//num matches calculations
	//scale tower accuracy (maybe)
	//
	































// Get a response from the database by sending the connection and the query
	$allSearch = @mysqli_query($dbc, $allQuery);
	if($allSearch){
		echo "<b>$team</b>"
		echo '<table align="left"
		cellspacing="5" cellpadding="8">

		<tr><td align="left"><b>Auto Movement</b></td>
		<td align="left"><b>Auto Scoring</b></td>
		<td align="left"><b>Category A Defence</b></td>
		<td align="left"><b>Times Crossed Category A</b></td>
		<td align="left"><b>Category B Defence</b></td>
		<td align="left"><b>Times Crossed Category B</b></td>
		<td align="left"><b>Category C Defence</b></td>
		<td align="left"><b>Times Crossed Category C</b></td>
		<td align="left"><b>Category D Defence</b></td></td>
		<td align="left"><b>Times Crossed Category D</b></td>
		<td align="left"><b>Times Crossed Low Bar</b></td>
		<td align="left"><b>Low Goal Shots Made</b></td>
		<td align="left"><b>High Goal Shots Made</b></td>
		<td align="left"><b>Comments</b></tr>';
//"left""right""left""right"
// mysqli_fetch_array will return a row of data from the query
// until no further data is available
		while($row = mysqli_fetch_array($allSearch)){
			echo '<tr>
			<td align="left">' . $row['autoDefence'] . '</td>
			<td align="left">' . $row['highGoalAutoShotsMade'] . '</td>
			<td align="left">' . $row['lowGoalAutoShotsMade'] . '</td>
			<td align="left">' . $row['categoryA'] . '</td>
			<td align="left">' . $row['categoryAScore'] . '</td>
			<td align="left">' . $row['categoryB'] . '</td>
			<td align="left">' . $row['categoryBScore'] . '</td>
			<td align="left">' . $row['categoryC'] . '</td>
			<td align="left">' . $row['categoryCScore'] . '</td>
			<td align="left">' . $row['categoryD'] . '</td>
			<td align="left">' . $row['categoryDScore'] . '</td>
			<td align="left">' . $row['lowGoalShots'] . '</td>
			<td align="left">' . $row['highGoalShots'] . '</td>
			<td align="left">' . $row['comments'] . '</td>
			<td align="left">';
			echo '</tr>';
		}
		echo '</table>';
	} else{
		echo "Couldn't issue database query<br />";
		echo mysqli_error($dbc);
	}
// Close connection to the database
mysqli_close($dbc);
// mysqli_num_rows()
//mysqli_fetch_lengths() Returns an array if integer that represents the size of each field (column)

?>
