<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

// wait till it's posted
if(isset($_POST['search'])){

// Which team is being searched for
    $team = trim($_POST['team']);
    $team = trim($_POST['team2']);

// Creates querys for the database
//do all calculations based on these query's then display data
	//$allQuery = "SELECT autoDefence, highGoalAutoShotsMade, lowGoalAutoShotsMade, categoryA, categoryAScore, categoryB, categoryBScore, categoryC, categoryCScore, categoryD, categoryDScore, lowBarScore, lowGoalShots, highGoalShots, comments FROM match WHERE team = $team";
	$portcullisQuery = "SELECT SUM(categoryAScore) AS PortcullisCrosses FROM match WHERE team = $team AND categoryA ='Portcullis'";
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
	$towerScaleQuery = "SELECT scaleTower FROM match WHERE team = $team AND scaleTower = 'Yes'";
	$towerChallengeQuery = "SELECT challengeTower FROM match WHERE team = $team AND scaleTower = 'Yes'";
	$commentsQuery = "SELECT comments FROM match WHERE team = $team AND comments != 'N/A'";


	// Searching Database for what we need //

	$portcullisSearch = @mysqli_query($dbc, $portcullisQuery);
	$chevalDeFriseSearch = @mysqli_query($dbc, $chevalDeFriseQuery);
	$moatSearch = @mysqli_query($dbc, $moatQuery);
	$rampartsSearch = @mysqli_query($dbc, $rampartsQuery);
	$drawbridgeSearch = @mysqli_query($dbc, $drawbridgeQuery);
	$sallyPortSearch = @mysqli_query($dbc, $sallyPortQuery);
	$rockWallSearch = @mysqli_query($dbc, $rockWallQuery);
	$roughTerrainSearch = @mysqli_query($dbc, $roughTerrainQuery);
	$lowBarSearch = @mysqli_query($dbc, $lowBarQuery);

	$lowGoalHitsSearch = @mysqli_query($dbc, $lowGoalHitsQuery);
	$lowGoalMissesSearch = @mysqli_query($dbc, $lowGoalMissesQuery);
	$highGoalHitsSearch = @mysqli_query($dbc, $highGoalHitsQuery);
	$highGoalMissesSearch = @mysqli_query($dbc, $highGoalMissesQuery);
	$towerScaleSearch = @mysqli_query($dbc, $towerScaleQuery);
	$towerChallengeSearch = @mysqli_query($dbc, $towerChallengeQuery);

	$numMatchesSearch = @mysqli_query($dbc, $numMatchesQuery);
	$commentsSearch = @mysqli_query($dbc, $commentsQuery);



// Search Calculations //
	if($portcullisSearch && $chevalDeFriseSearch && $moatSearch && $rampartsSearch && 
		$drawbridgeSearch && $sallyPortSearch && $rockWallSearch && $roughTerrainSearch &&
		$lowBarSearch && $lowGoalHitsSearch && $lowGoalMissesSearch && $highGoalHitsSearch &&
		$highGoalMissesSearch && $towerScaleSearch && $noTowerScaleSearch && $numMatchesSearch){

		//Scaling / Challengeing Calculations //
		$numScale = mysqli_num_rows($towerScaleSearch);
		$numberOfMatches = mysqli_num_rows($numMatchesSearch);
		if($numScale > 0){
			$scaleAccuracy = "$numScale / $numberOfMatches"; // Output for Challenge data
		} else {
			$scaleAccuracy = "N/A"
		}
		$numChallenge = mysqli_num_rows($towerChallengeSearch);
		if($numChallenge > 0){
			$challengeAccuracy = "$numChallenge / $numberOfMatches"; // Output for Challenge data
		} else {
			$challengeAccuracy = "N/A"
		}

		// Low goal Accuracy Calculations //	
		$lgha = mysql_fetch_assoc($lowGoalHitsSearch); 
		$lowGoalHits = $lgha['LowGoalHits']; // Num low goal shots made
		$lgma = mysql_fetch_assoc($lowGoalMissesSearch); 
		$lowGoalMisses = $lgma['LowGoalMisses'];
		$totalLowGoalShots = ($lowGoalHits+$lowGoalMisses);
		$lowGoalAccuracy = (($lowGoalHits/$totalLowGoalShots)*100); 
		$lowGoalAccuracy = round($lowGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		// ALSO DISPLAY "$lowGoalHits/$totalLowGoalShots"

		// High Goal Accuracy Calculations //
		$hgha = mysql_fetch_assoc($highGoalHitsSearch); 
		$highGoalHits = $lgha['HighGoalHits']; // Num high goal shots made
		$hgma = mysql_fetch_assoc($highGoalMissesSearch); 
		$highGoalMisses = $lgma['HighGoalMisses'];
		$totalHighGoalShots = ($highGoalHits+$highGoalMisses);
		$highGoalAccuracy = (($highGoalHits/$totalHighGoalShots)*100); 
		$highGoalAccuracy = round($highGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		// ALSO DISPLAY "$highGoalHits/$totalhighGoalShots"

		//Defence Varriable's //

		$portcullis = mysql_fetch_assoc($portcullisSearch);
		$chevalDeFrise = mysql_fetch_assoc($chevalDeFriseSearch);
		$moat = mysql_fetch_assoc($moatSearch);
		$ramparts = mysql_fetch_assoc($rampartsSearch);
		$drawbridge = mysql_fetch_assoc($drawbridgeSearch);
		$sallyPort= mysql_fetch_assoc($sallyPortSearch);
		$rockWall = mysql_fetch_assoc($rockWallSearch);
		$roughTerrain = mysql_fetch_assoc($roughTerrainSearch);
		$lowBar = mysql_fetch_assoc($lowBarSearch);

		//todo
		//num matches calculations

		





	} else{
		echo "Couldn't issue database query";
		echo mysqli_error($dbc);
	}
}
// Close connection to the database
mysqli_close($dbc);
// mysqli_num_rows()
//mysqli_fetch_lengths() Returns an array if integer that represents the size of each field (column)

?>
