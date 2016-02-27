<?php

class teamReport {
	public $team;
    function __construct($team) {
    	$this->team = $team;
	}
	// Get a connection for the database
	require_once('../mysqli_connect.php');

	// Creates querys for the database
	//do all calculations based on these query's then display data
	//$allQuery = "SELECT autoDefence, highGoalAutoShotsMade, lowGoalAutoShotsMade, categoryA, categoryAScore, categoryB, categoryBScore, categoryC, categoryCScore, categoryD, categoryDScore, lowBarScore, lowGoalShots, highGoalShots, comments FROM match WHERE team = $team";
	private $portcullisQuery = "SELECT SUM(categoryAScore) AS PortcullisCrosses FROM `match` WHERE team = {$this->team} AND categoryA ='Portcullis'";
	private $chevalDeFriseQuery = "SELECT SUM(categoryAScore) AS ChevalCrosses FROM `match` WHERE team = {$this->team} AND categoryA ='Cheval de Frise'";
	private $moatQuery = "SELECT SUM(categoryBScore) AS MoatCrosses FROM `match` WHERE team = {$this->team} AND categoryB ='Moat'";
	private $rampartsQuery = "SELECT SUM(categoryBScore) AS RampartCrosses FROM `match` WHERE team = {$this->team} AND categoryB ='Ramparts'";
	private $drawbridgeQuery = "SELECT SUM(categoryCScore) AS DrawbridgeCrosses FROM `match` WHERE team = {$this->team} AND categoryC ='Drawbridge'";
	private $sallyPortQuery = "SELECT SUM(categoryCScore) AS SallyPortCrosses FROM `match` WHERE team = {$this->team} AND categoryC ='Sally Port'";
	private $rockWallQuery = "SELECT SUM(categoryDScore) AS RockWallCrosses FROM `match` WHERE team = {$this->team} AND categoryD ='Rock Wall'";
	private $roughTerrainQuery = "SELECT SUM(categoryDScore) AS RoughTerrainCrosses FROM `match` WHERE team = {$this->team} AND categoryD ='Rough Terrain'";
	private $lowBarQuery = "SELECT SUM(lowBarScore) AS LowBarCrosses FROM `match` WHERE team = {$this->team}";
	private $lowGoalHitsQuery = "SELECT SUM(lowGoalShots) AS LowGoalHits FROM `match` WHERE team = {$this->team}";
	private $lowGoalMissesQuery = "SELECT SUM(missedLowGoalShots) AS LowGoalMisses FROM `match` WHERE team = {$this->team}";
	private $highGoalHitsQuery = "SELECT SUM(highGoalShots) AS HighGoalHits FROM `match` WHERE team = {$this->team}";
	private $highGoalMissesQuery = "SELECT SUM(highGoalShots) AS HighGoalMisses FROM `match` WHERE team = {$this->team}";
	private $numMatchesQuery = "SELECT team FROM `match` WHERE team = {$this->team}";
	private $towerScaleQuery = "SELECT scaleTower FROM `match` WHERE team = {$this->team} AND scaleTower = 'Yes'";
	private $towerChallengeQuery = "SELECT challengeTower FROM `match` WHERE team = {$this->team} AND challengeTower = 'Yes'";
	private $commentsQuery = "SELECT comments FROM `match` WHERE team = {$this->team} AND comments != 'N/A'";

	private $autoBreachedQuery = "SELECT autoDefence FROM `match` WHERE team = {$this->team} AND autoDefence ='Breached'";
	private $autoReachedQuery = "SELECT autoDefence FROM `match` WHERE team = {$this->team} AND autoDefence ='Reached'";
	private $autoBreachedLowBarQuery = "SELECT breachDefence FROM `match` WHERE team = {$this->team} AND autoDefence ='Low Bar'";
	private $autoBreachedOtherQuery = "SELECT breachDefence FROM `match` WHERE team = {$this->team} AND autoDefence ='Other'";

	// Searching Database for what we need //

	public $portcullisSearch = @mysqli_query($dbc, $this->portcullisQuery);
	public $chevalDeFriseSearch = @mysqli_query($dbc, $this->chevalDeFriseQuery);
	public $moatSearch = @mysqli_query($dbc, $this->moatQuery);
	public $rampartsSearch = @mysqli_query($dbc, $this->rampartsQuery);
	public $drawbridgeSearch = @mysqli_query($dbc, $this->drawbridgeQuery);
	public $sallyPortSearch = @mysqli_query($dbc, $this->sallyPortQuery);
	public $rockWallSearch = @mysqli_query($dbc, $this->rockWallQuery);
	public $roughTerrainSearch = @mysqli_query($this->dbc, $roughTerrainQuery);
	public $lowBarSearch = @mysqli_query($dbc, $this->lowBarQuery);

	private $lowGoalHitsSearch = @mysqli_query($dbc, $this->lowGoalHitsQuery);
	private $lowGoalMissesSearch = @mysqli_query($dbc, $this->lowGoalMissesQuery);
	private $highGoalHitsSearch = @mysqli_query($dbc, $this->highGoalHitsQuery);
	private $highGoalMissesSearch = @mysqli_query($dbc, $this->highGoalMissesQuery);
	private $towerScaleSearch = @mysqli_query($dbc, $this->towerScaleQuery);
	private $towerChallengeSearch = @mysqli_query($dbc, $this->towerChallengeQuery);

	private $numMatchesSearch = @mysqli_query($dbc, $this->numMatchesQuery);
	private $commentsSearch = @mysqli_query($dbc, $this->commentsQuery);

	private $autoBreachedSearch = @mysqli_query($dbc, $this->autoBreachedQuery);
	private $autoReachedSearch = @mysqli_query($dbc, $this->autoReachedQuery);
	private $autoBreachedLowBarSearch = @mysqli_query($dbc, $this->autoBreachedLowBarQuery);
	private $autoBreachedOtherSearch = @mysqli_query($dbc, $this->autoBreachedOtherQuery);

	//Error Checking


	// Search Calculations //
	if($this->portcullisSearch && $this->chevalDeFriseSearch && $this->moatSearch && $this->rampartsSearch && 
		$this->drawbridgeSearch && $this->sallyPortSearch && $this->rockWallSearch && $this->roughTerrainSearch &&
		$this->lowBarSearch && $this->lowGoalHitsSearch && $this->lowGoalMissesSearch && $this->highGoalHitsSearch &&
		$this->highGoalMissesSearch && $this->towerScaleSearch && $this->noTowerScaleSearch && $this->numMatchesSearch &&
		$this->commentsSearch && $this->autoNoInteractionSearch && $this->autoBreachedSearch && $this->autoReachedSearch &&
		$this->autoBreachedLowBarSearch && $this->autoBreachedOtherSearch){

		//Varriables
		private $numberOfMatches = mysqli_num_rows($this->numMatchesSearch);
		private $autoLowBar = mysqli_num_rows($this->autoBreachedLowBarSearch);
		private $autoOther = mysqli_num_rows($this->autoBreachedOtherSearch);
		private $numScale = mysqli_num_rows($this->towerScaleSearch);
		private $numChallenge = mysqli_num_rows($this->towerChallengeSearch);




		//Auto Calculations
		public $highestAutoMovement = 'N/A';
		if(mysqli_num_rows($this->autoBreachedSearch) >= 1){
			$this->highestAutoMovement = 'Breached';
		} elseif(mysqli_num_rows($this->autoReachedSearch) >= 1) {
			$this->highestAutoMovement = 'Reached';
		} else {
			$this->highestAutoMovement = 'No Interaction';
		}

		public $autoBreachLowBar = 'N/A';
		public $autoBreachOther = 'N/A';
		if(mysqli_num_rows($this->autoBreachedSearch) >= 1){
			if(mysqli_num_rows($this->autoBreachedLowBarSearch) >= 1){
				$this->autoBreachLowBar = "{$this->autoLowBar}/{$this->numberOfMatches}";
			}
			if(mysqli_num_rows($this->autoBreachedOtherSearch) >= 1){
				$this->autoBreachOther = "{$this->autoOther}/{$this->numberOfMatches}";
			}
		}


		//Scaling / Challengeing Calculations //
		
		if($this->numScale > 0){
			public $scaleAccuracy = "{$this->numScale}/{$this->numberOfMatches}"; // Output for Challenge data
		} else {
			public $scaleAccuracy = "N/A";
		}
		if($this->numChallenge > 0){
			public $challengeAccuracy = "{$this->numChallenge}/{$this->numberOfMatches}"; // Output for Challenge data
		} else {
			public $challengeAccuracy = "N/A";
		}

		// Low goal Accuracy Calculations //	

		private $lgha = mysql_fetch_assoc($this->lowGoalHitsSearch);
		public $lowGoalHits = $this->lgha['LowGoalHits']; // Num low goal shots made
		private $lgma = mysql_fetch_assoc($lowGoalMissesSearch); 
		private $lowGoalMisses = $this->lgma['LowGoalMisses'];
		public $totalLowGoalShots = ($this->lowGoalHits+$this->lowGoalMisses);
		private $lowGoalAccuracy = (($this->lowGoalHits/$this->totalLowGoalShots)*100); 
		$this->lowGoalAccuracy = round($this->lowGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		public $lowGoalAccuracyFraction = {$this->lowGoalHits}/{$this->numberOfMatches};
		$this->lowGoalAccuracyFraction = round($this->lowGoalAccuracyFraction, 1, PHP_ROUND_HALF_UP);
		public $lowGoalAccuracyPercent = "{$this->lowGoalHits}/{$this->totalLowGoalShots} ({$this->lowGoalAccuracy}%)";

		// High Goal Accuracy Calculations //
		private $hgha = mysql_fetch_assoc($this->highGoalHitsSearch); 
		public $highGoalHits = $this->hgha['HighGoalHits']; // Num high goal shots made
		private $hgma = mysql_fetch_assoc($this->highGoalMissesSearch); 
		private $highGoalMisses = $this->hgma['HighGoalMisses'];
		public $totalHighGoalShots = ($this->highGoalHits+$this->highGoalMisses);
		private $highGoalAccuracy = (($this->highGoalHits/$this->totalHighGoalShots)*100); 
		$this->highGoalAccuracy = round($this->highGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		public $highGoalAccuracyFraction = {$this->highGoalHits}/{$this->numberOfMatches}; 
		$this->highGoalAccuracyFraction = round($this->highGoalAccuracyFraction, 1, PHP_ROUND_HALF_UP);
		public $highGoalAccuracyPercent = "{$this->highGoalHits}/{$this->totalHighGoalShots} ({$this->highGoalAccuracy}%)";

		//Defence Varriable's //

		private $portcullisVar = mysql_fetch_assoc($this->portcullisSearch);
		private $chevalDeFriseVar = mysql_fetch_assoc($this->chevalDeFriseSearch);
		private $moatVar = mysql_fetch_assoc($this->moatSearch);
		private $rampartsVar = mysql_fetch_assoc($this->rampartsSearch);
		private $drawbridgeVar = mysql_fetch_assoc($this->drawbridgeSearch);
		private $sallyPortVar = mysql_fetch_assoc($this->sallyPortSearch);
		private $rockWallVar = mysql_fetch_assoc($this->rockWallSearch);
		private $roughTerrainVar = mysql_fetch_assoc($this->roughTerrainSearch);
		private $lowBarVar = mysql_fetch_assoc($this->lowBarSearch);

		public $portcullis = "{$this->portcullisVar['PortcullisCrosses']}/{$this->numberOfMatches}";
		public $chevalDeFrise = "{$this->chevalDeFriseVar['ChevalCrosses']}/{$this->numberOfMatches}";
		public $moat = "{$this->moatVar['MoatCrosses']}/{$this->numberOfMatches}";
		public $ramparts = "{$this->rampartsVar['RampartCrosses']}/{$this->numberOfMatches}";
		public $drawbridge = "{$this->drawbridgeVar['DrawbridgeCrosses']}/{$this->numberOfMatches}";
		public $sallyPort= "{$this->sallyPortVar['SallyPortCrosses']}/{$this->numberOfMatches}";
		public $rockWall = "{$this->rockWallVar['RockWallCrosses']}/{$this->numberOfMatches}";
		public $roughTerrain = "{$this->roughTerrainVar['RoughTerrainCrosses']}/{$this->numberOfMatches}";
		public $lowBar = "{$this->lowBarVar['LowBarCrosses']}/{$this->numberOfMatches}";

		//todo
		//num matches calculations
	} else{
		echo "Couldn't issue database query";
		echo mysqli_error($dbc);
	}
};
// Close connection to the database
mysqli_close($dbc);
// mysqli_num_rows()
//mysqli_fetch_lengths() Returns an array if integer that represents the size of each field (column)
// mysqli_fetch_array will return a row of data from the query until no further data is available

//add alliance color

?>
