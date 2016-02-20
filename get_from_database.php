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
	private $defenceAQuery = "SELECT matchNum FROM 'match'";
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

	//Error Checking


	// Search Calculations //
	if($this->portcullisSearch && $this->chevalDeFriseSearch && $this->moatSearch && $this->rampartsSearch && 
		$this->drawbridgeSearch && $this->sallyPortSearch && $this->rockWallSearch && $this->roughTerrainSearch &&
		$this->lowBarSearch && $this->lowGoalHitsSearch && $this->lowGoalMissesSearch && $this->highGoalHitsSearch &&
		$this->highGoalMissesSearch && $this->towerScaleSearch && $this->noTowerScaleSearch && $this->numMatchesSearch){

		//Scaling / Challengeing Calculations //
		private $numScale = mysqli_num_rows($this->towerScaleSearch);
		private $numberOfMatches = mysqli_num_rows($this->numMatchesSearch);
		if($this->numScale > 0){
			public $scaleAccuracy = "{$this->numScale}/{$this->numberOfMatches}"; // Output for Challenge data
		} else {
			public $scaleAccuracy = "N/A";
		}
		private $numChallenge = mysqli_num_rows($this->towerChallengeSearch);
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
		private $lowGoalAccuracy = round($this->lowGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		public $lowGoalAccuracyFraction = "{$this->lowGoalHits}/{$this->totalLowGoalShots}";
		public $lowGoalAccuracyPercent = "{$this->lowGoalAccuracy}%";

		// High Goal Accuracy Calculations //
		private $hgha = mysql_fetch_assoc($this->highGoalHitsSearch); 
		public $highGoalHits = $this->lgha['HighGoalHits']; // Num high goal shots made
		private $hgma = mysql_fetch_assoc($this->highGoalMissesSearch); 
		private $highGoalMisses = $this->lgma['HighGoalMisses'];
		public $totalHighGoalShots = ($this->highGoalHits+$this->highGoalMisses);
		private $highGoalAccuracy = (($this->highGoalHits/$this->totalHighGoalShots)*100); 
		private $highGoalAccuracy = round($this->highGoalAccuracy, 1, PHP_ROUND_HALF_UP); //double value of hit precentage
		public $highGoalAccuracyFraction = "{$this->highGoalHits}/{$this->totalhighGoalShots}";
		public $highGoalAccuracyPercent = "{$this->highGoalAccuracy}%";

		//Defence Varriable's //

		public $portcullis = mysql_fetch_assoc($this->portcullisSearch);
		public $chevalDeFrise = mysql_fetch_assoc($this->chevalDeFriseSearch);
		public $moat = mysql_fetch_assoc($this->moatSearch);
		public $ramparts = mysql_fetch_assoc($this->rampartsSearch);
		public $drawbridge = mysql_fetch_assoc($this->drawbridgeSearch);
		public $sallyPort= mysql_fetch_assoc($this->sallyPortSearch);
		public $rockWall = mysql_fetch_assoc($this->rockWallSearch);
		public $roughTerrain = mysql_fetch_assoc($this->roughTerrainSearch);
		public $lowBar = mysql_fetch_assoc($this->lowBarSearch);

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

?>
