<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

class teamReport {
	public $team;
    function __construct($team) {
    	$this->team = $team;
	}
	// Creates querys for the database
	//do all calculations based on these query's then display data
	private $defenceAQuery = "SELECT matchNum FROM match";
	//$allQuery = "SELECT autoDefence, highGoalAutoShotsMade, lowGoalAutoShotsMade, categoryA, categoryAScore, categoryB, categoryBScore, categoryC, categoryCScore, categoryD, categoryDScore, lowBarScore, lowGoalShots, highGoalShots, comments FROM match WHERE team = $team";
	private $portcullisQuery = "SELECT SUM(categoryAScore) AS PortcullisCrosses FROM match WHERE team = $team AND categoryA ='Portcullis'";
	private $chevalDeFriseQuery = "SELECT SUM(categoryAScore) AS ChevalCrosses FROM match WHERE team = $team AND categoryA ='Cheval de Frise'";
	private $moatQuery = "SELECT SUM(categoryBScore) AS MoatCrosses FROM match WHERE team = $team AND categoryB ='Moat'";
	private $rampartsQuery = "SELECT SUM(categoryBScore) AS RampartCrosses FROM match WHERE team = $team AND categoryB ='Ramparts'";
	private $drawbridgeQuery = "SELECT SUM(categoryCScore) AS DrawbridgeCrosses FROM match WHERE team = $team AND categoryC ='Drawbridge'";
	private $sallyPortQuery = "SELECT SUM(categoryCScore) AS SallyPortCrosses FROM match WHERE team = $team AND categoryC ='Sally Port'";
	private $rockWallQuery = "SELECT SUM(categoryDScore) AS RockWallCrosses FROM match WHERE team = $team AND categoryD ='Rock Wall'";
	private $roughTerrainQuery = "SELECT SUM(categoryDScore) AS RoughTerrainCrosses FROM match WHERE team = $team AND categoryD ='Rough Terrain'";
	private $lowBarQuery = "SELECT SUM(lowBarScore) AS LowBarCrosses FROM match WHERE team = $team";
	private $lowGoalHitsQuery = "SELECT SUM(lowGoalShots) AS LowGoalHits FROM match WHERE team = $team";
	private $lowGoalMissesQuery = "SELECT SUM(missedLowGoalShots) AS LowGoalMisses FROM match WHERE team = $team";
	private $highGoalHitsQuery = "SELECT SUM(highGoalShots) AS HighGoalHits FROM match WHERE team = $team";
	private $highGoalMissesQuery = "SELECT SUM(highGoalShots) AS HighGoalMisses FROM match WHERE team = $team";
	private $numMatchesQuery = "SELECT team FROM match WHERE team = team";
	private $towerScaleQuery = "SELECT scaleTower FROM match WHERE team = $team AND scaleTower = 'Yes'";
	private $towerChallengeQuery = "SELECT challengeTower FROM match WHERE team = $team AND challengeTower = 'Yes'";
	private $commentsQuery = "SELECT comments FROM match WHERE team = $team AND comments != 'N/A'";


	// Searching Database for what we need //

	private $portcullisSearch = @mysqli_query($dbc, $portcullisQuery);
	private $chevalDeFriseSearch = @mysqli_query($dbc, $chevalDeFriseQuery);
	private $moatSearch = @mysqli_query($dbc, $moatQuery);
	private $rampartsSearch = @mysqli_query($dbc, $rampartsQuery);
	private $drawbridgeSearch = @mysqli_query($dbc, $drawbridgeQuery);
	private $sallyPortSearch = @mysqli_query($dbc, $sallyPortQuery);
	private $rockWallSearch = @mysqli_query($dbc, $rockWallQuery);
	private $roughTerrainSearch = @mysqli_query($dbc, $roughTerrainQuery);
	private $lowBarSearch = @mysqli_query($dbc, $lowBarQuery);

	private $lowGoalHitsSearch = @mysqli_query($dbc, $lowGoalHitsQuery);
	private $lowGoalMissesSearch = @mysqli_query($dbc, $lowGoalMissesQuery);
	private $highGoalHitsSearch = @mysqli_query($dbc, $highGoalHitsQuery);
	private $highGoalMissesSearch = @mysqli_query($dbc, $highGoalMissesQuery);
	private $towerScaleSearch = @mysqli_query($dbc, $towerScaleQuery);
	private $towerChallengeSearch = @mysqli_query($dbc, $towerChallengeQuery);

	private $numMatchesSearch = @mysqli_query($dbc, $numMatchesQuery);
	private $commentsSearch = @mysqli_query($dbc, $commentsQuery);

	//Error Checking


	// Search Calculations //
	if($portcullisSearch && $chevalDeFriseSearch && $moatSearch && $rampartsSearch && 
		$drawbridgeSearch && $sallyPortSearch && $rockWallSearch && $roughTerrainSearch &&
		$lowBarSearch && $lowGoalHitsSearch && $lowGoalMissesSearch && $highGoalHitsSearch &&
		$highGoalMissesSearch && $towerScaleSearch && $noTowerScaleSearch && $numMatchesSearch){

		//Scaling / Challengeing Calculations //
		private $numScale = mysqli_num_rows($towerScaleSearch);
		private $numberOfMatches = mysqli_num_rows($numMatchesSearch);
		if($numScale > 0){
			public $scaleAccuracy = "$numScale / $numberOfMatches"; // Output for Challenge data
		} else {
			public $scaleAccuracy = "N/A"
		}
		private $numChallenge = mysqli_num_rows($towerChallengeSearch);
		if($numChallenge > 0){
			public $challengeAccuracy = "$numChallenge / $numberOfMatches"; // Output for Challenge data
		} else {
			public $challengeAccuracy = "N/A"
		}

		// Low goal Accuracy Calculations //	
		private $lgha = mysql_fetch_assoc($lowGoalHitsSearch); 
		public $lowGoalHits = $lgha['LowGoalHits']; // Num low goal shots made
		private $lgma = mysql_fetch_assoc($lowGoalMissesSearch); 
		private $lowGoalMisses = $lgma['LowGoalMisses'];
		public $totalLowGoalShots = ($lowGoalHits+$lowGoalMisses);
		private $lowGoalAccuracy = (($lowGoalHits/$totalLowGoalShots)*100); 
		public $lowGoalAccuracy = round($lowGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		// ALSO DISPLAY "$lowGoalHits/$totalLowGoalShots"

		// High Goal Accuracy Calculations //
		private$hgha = mysql_fetch_assoc($highGoalHitsSearch); 
		public$highGoalHits = $lgha['HighGoalHits']; // Num high goal shots made
		private$hgma = mysql_fetch_assoc($highGoalMissesSearch); 
		private$highGoalMisses = $lgma['HighGoalMisses'];
		public$totalHighGoalShots = ($highGoalHits+$highGoalMisses);
		private$highGoalAccuracy = (($highGoalHits/$totalHighGoalShots)*100); 
		public$highGoalAccuracy = round($highGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		// ALSO DISPLAY "$highGoalHits/$totalhighGoalShots"

		//Defence Varriable's //

		public $portcullis = mysql_fetch_assoc($portcullisSearch);
		public $chevalDeFrise = mysql_fetch_assoc($chevalDeFriseSearch);
		public $moat = mysql_fetch_assoc($moatSearch);
		public $ramparts = mysql_fetch_assoc($rampartsSearch);
		public $drawbridge = mysql_fetch_assoc($drawbridgeSearch);
		public $sallyPort= mysql_fetch_assoc($sallyPortSearch);
		public $rockWall = mysql_fetch_assoc($rockWallSearch);
		public $roughTerrain = mysql_fetch_assoc($roughTerrainSearch);
		public $lowBar = mysql_fetch_assoc($lowBarSearch);

		//todo
		//num matches calculations
	} else{
		echo "Couldn't issue database query";
		echo mysqli_error($dbc);
	}
};

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
// access by obj->$var & obj->$method()
	$redTeam1Object = new teamReport($redTeam1);
	$redTeam2Object = new teamReport($redTeam2);
	$redTeam3Object = new teamReport($redTeam3);
	$blueTeam1Object = new teamReport($blueTeam1);
	$blueTeam2Object = new teamReport($blueTeam2);
	$blueTeam3Object = new teamReport($blueTeam3);

}

// Close connection to the database
mysqli_close($dbc);
// mysqli_num_rows()
//mysqli_fetch_lengths() Returns an array if integer that represents the size of each field (column)

?>
