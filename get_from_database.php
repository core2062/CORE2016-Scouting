<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// wait till it's posted
if(isset($_POST['search'])){

// Which team is being searched for
    $team = trim($_POST['team']);

// Creates querys for the database
//do all calculations based on these query's then display data
	$allQuery = "SELECT autoDefence, autoShoot, categoryA, categoryAScore, categoryB, categoryBScore, categoryC, categoryCScore, categoryD, categoryDScore, lowBarScore, lowGoalShots, highGoalShots, comments FROM match WHERE team = $team";
	$portcullisQuery = "SELECT categoryAScore FROM match WHERE team = $team AND categoryA ='Portcullis'";
	$chevalDeFriseQuery = "SELECT categoryAScore FROM match WHERE team = $team AND categoryA ='Cheval de Frise'";
	$moatQuery = "SELECT categoryBScore FROM match WHERE team = $team AND categoryB ='Moat'";
	$rampartsQuery = "SELECT categoryBScore FROM match WHERE team = $team AND categoryB ='Ramparts'";
	$drawbridgeQuery = "SELECT categoryCScore FROM match WHERE team = $team AND categoryC ='drawbridge'";
	$sallyPortQuery = "SELECT categoryCScore FROM match WHERE team = $team AND categoryC ='Sally Port'";
	$lowBarQuery = "SELECT lowBarScore FROM match WHERE team = $team";
	$lowGoalQuery = "SELECT lowGoalShots FROM match WHERE team = $team";
	$highGoalQuery = "SELECT highGoalShots FROM match WHERE team = $team";
	$numMatchesQuery = "SELECT team FROM match WHERE team = $team";

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

// mysqli_fetch_array will return a row of data from the query
// until no further data is available
		while($row = mysqli_fetch_array($response)){
			echo '<tr>
			<td align="left">' . $row['autoShoot'] . '</td>
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

?>