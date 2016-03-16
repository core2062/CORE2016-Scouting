<?php
include 'get_from_database.php';
class OPR extends teamReport{
	public $team;

	private $numberOfMatches;
	private $searchError = false;

	private $portcullisSearch;
	private $chevalDeFriseSearch;
	private $moatSearch;
	private $rampartsSearch;
	private $drawbridgeSearch;
	private $sallyPortSearch;
	private $rockWallSearch;
	private $roughTerrainSearch;
	private $lowBarSearch;
	private $numportcullis;
	private $numchevalDeFrise;
	private $nummoat;
	private $numramparts;
	private $numdrawbridge;
	private $numsallyPort;
	private $numrockWall;
	private $numroughTerrain;
	private $numlowBar;
	private $autoBreachedSearch;
	private $autoReachedSearch;
	private $towerScaleSearch;
	private $towerChallengeSearch;
	private $MLGAS;
	private $autoLowGoalsMade;
	private $lowGoalAutoMisses;
	private $MHGAS;
	private $autoHighGoalsMade;
	private $highGoalAutoMisses;
	private $autoOther;
	private $autoLowBar;
	private $lgma;
	private $lgha;
	private $hgma;
	private $hgha; 

	function __construct($team){
		$this->team = $team;

		require('SQLi_connect.php');

    	// Creates querys for the database
	
		$portcullisQuery = "SELECT categoryAScore AS PortcullisCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryA` ='Portcullis'";
		$chevalDeFriseQuery = "SELECT categoryAScore AS ChevalCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryA` ='Cheval de Frise'";
		$moatQuery = "SELECT categoryBScore AS MoatCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryB` ='Moat'";
		$rampartsQuery = "SELECT categoryBScore AS RampartCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryB` ='Ramparts'";
		$drawbridgeQuery = "SELECT categoryCScore AS DrawbridgeCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryC` ='Drawbridge'";
		$sallyPortQuery = "SELECT categoryCScore AS SallyPortCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryC` ='Sally Port'";
		$rockWallQuery = "SELECT categoryDScore AS RockWallCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryD` ='Rock Wall'";
		$roughTerrainQuery = "SELECT categoryDScore AS RoughTerrainCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryD` ='Rough Terrain'";
		$lowBarQuery = "SELECT lowBarScore AS LowBarCrosses FROM `match` WHERE `team` = {$this->team}";
		$lowGoalHitsQuery = "SELECT SUM(lowGoalShots) AS LowGoalHits FROM `match` WHERE `team` = {$this->team}";
		$lowGoalMissesQuery = "SELECT SUM(missedLowGoalShots) AS LowGoalMisses FROM `match` WHERE `team` = {$this->team}";
		$highGoalHitsQuery = "SELECT SUM(highGoalShots) AS HighGoalHits FROM `match` WHERE `team` = {$this->team}";
		$highGoalMissesQuery = "SELECT SUM(highGoalShots) AS HighGoalMisses FROM `match` WHERE `team` = {$this->team}";
		$numMatchesQuery = "SELECT team FROM `match` WHERE `team` = {$this->team}";
		$towerScaleQuery = "SELECT scaleTower FROM `match` WHERE `team` = {$this->team} AND `scaleTower` = 'Yes'";
		$towerChallengeQuery = "SELECT challengeTower FROM `match` WHERE `team` = {$this->team} AND `challengeTower` = 'Yes'";
		$autoBreachedQuery = "SELECT autoDefence FROM `match` WHERE `team` = {$this->team} AND `autoDefence` = 'Breached'";
		$autoReachedQuery = "SELECT autoDefence FROM `match` WHERE `team` = {$this->team} AND `autoDefence` = 'Reached'";
		$autoBreachedLowBarQuery = "SELECT breachDefence FROM `match` WHERE `team` = {$this->team} AND `breachDefence` = 'Low Bar'";
		$autoBreachedOtherQuery = "SELECT breachDefence FROM `match` WHERE `team` = {$this->team} AND `breachDefence` = 'Other'";
		$highGoalAutoShotsMadeQuery = "SELECT SUM(highGoalAutoShotsMade) AS HGAutoMade FROM `match` WHERE `team` = {$this->team}";
		$highGoalAutoMissesQuery = "SELECT SUM(highGoalAutoMisses) AS HGAutoMisses FROM `match` WHERE `team` = {$this->team}";
		$lowGoalAutoShotsMadeQuery = "SELECT SUM(lowGoalAutoShotsMade) AS LGAutoMade FROM `match` WHERE `team` = {$this->team}";
		$lowGoalAutoMissesQuery = "SELECT SUM(lowGoalAutoMisses) AS LGAutoMisses FROM `match` WHERE `team` = {$this->team}";
		$maxHighGoalAutoShotQuery = "SELECT MAX(highGoalAutoShotsMade) AS HGAutoMax FROM `match` WHERE `team` = {$this->team}";
		$maxLowGoalAutoShotQuery = "SELECT MAX(lowGoalAutoShotsMade) AS LGAutoMax FROM `match` WHERE `team` = {$this->team}";
		

		// Searching Database for what we need //


		$this->portcullisSearch = $dbc->query($portcullisQuery);
		$this->chevalDeFriseSearch = $dbc->query($chevalDeFriseQuery);
		$this->moatSearch = $dbc->query($moatQuery);
		$this->rampartsSearch = $dbc->query($rampartsQuery);
		$this->drawbridgeSearch = $dbc->query($drawbridgeQuery);
		$this->sallyPortSearch = $dbc->query($sallyPortQuery);
		$this->rockWallSearch = $dbc->query($rockWallQuery);
		$this->roughTerrainSearch = $dbc->query($roughTerrainQuery);
		$this->lowBarSearch = $dbc->query($lowBarQuery);
		$lowGoalHitsSearch = $dbc->query($lowGoalHitsQuery);
		$lowGoalMissesSearch = $dbc->query($lowGoalMissesQuery);
		$highGoalHitsSearch = $dbc->query($highGoalHitsQuery);
		$highGoalMissesSearch = $dbc->query($highGoalMissesQuery);
		$this->towerScaleSearch = $dbc->query($towerScaleQuery);
		$this->towerChallengeSearch = $dbc->query($towerChallengeQuery);
		$numMatchesSearch = $dbc->query($numMatchesQuery);
		$this->autoBreachedSearch = $dbc->query($autoBreachedQuery);
		$this->autoReachedSearch = $dbc->query($autoReachedQuery);
		$autoBreachedLowBarSearch = $dbc->query($autoBreachedLowBarQuery);
		$autoBreachedOtherSearch = $dbc->query($autoBreachedOtherQuery);
		$highGoalAutoShotsMadeSearch = $dbc->query($highGoalAutoShotsMadeQuery);
		$highGoalAutoMissesSearch = $dbc->query($highGoalAutoMissesQuery);
		$lowGoalAutoShotsMadeSearch = $dbc->query($lowGoalAutoShotsMadeQuery);
		$lowGoalAutoMissesSearch = $dbc->query($lowGoalAutoMissesQuery);
		$maxHighGoalAutoShotSearch = $dbc->query($maxHighGoalAutoShotQuery);
		$maxLowGoalAutoShotSearch = $dbc->query($maxLowGoalAutoShotQuery);
		    // Search Test //
		if(!($this->portcullisSearch && $this->chevalDeFriseSearch && $this->moatSearch && $this->rampartsSearch && 
		$this->drawbridgeSearch && $this->sallyPortSearch && $this->rockWallSearch && $this->roughTerrainSearch &&
		$this->lowBarSearch && $lowGoalHitsSearch && $lowGoalMissesSearch && $highGoalHitsSearch &&
		$highGoalMissesSearch && $this->towerScaleSearch && $this->towerChallengeSearch && $numMatchesSearch &&
		$this->autoBreachedSearch && $this->autoReachedSearch &&
		$autoBreachedLowBarSearch && $autoBreachedOtherSearch && $highGoalAutoShotsMadeSearch &&
		$highGoalAutoMissesSearch && $lowGoalAutoShotsMadeSearch && $lowGoalAutoMissesSearch &&
		$maxLowGoalAutoShotSearch && $maxHighGoalAutoShotSearch)){
			$this->searchError = true;
			echo "Couldn't issue database query/'s";
			echo mysqli_error($dbc);
		}
	
			// Varriables //
		$this->numberOfMatches = mysqli_num_rows($numMatchesSearch);
		$this->numportcullis = mysqli_num_rows($this->portcullisSearch);
		$this->numchevalDeFrise = mysqli_num_rows($this->chevalDeFriseSearch);
		$this->nummoat = mysqli_num_rows($this->moatSearch);
		$this->numramparts = mysqli_num_rows($this->rampartsSearch);
		$this->numdrawbridge = mysqli_num_rows($this->drawbridgeSearch);
		$this->numsallyPort = mysqli_num_rows($this->sallyPortSearch);
		$this->numrockWall = mysqli_num_rows($this->rockWallSearch);
		$this->numroughTerrain = mysqli_num_rows($this->roughTerrainSearch);
		$this->numlowBar = mysqli_num_rows($this->lowBarSearch);
		$this->MLGAS = mysqli_fetch_assoc($maxLowGoalAutoShotSearch);
		$this->autoLowGoalsMade = mysqli_fetch_assoc($lowGoalAutoShotsMadeSearch);
		$this->lowGoalAutoMisses = mysqli_fetch_assoc($lowGoalAutoMissesSearch);
		$this->MHGAS = mysqli_fetch_assoc($maxHighGoalAutoShotSearch);
		$this->autoHighGoalsMade = mysqli_fetch_assoc($highGoalAutoShotsMadeSearch);
		$this->highGoalAutoMisses = mysqli_fetch_assoc($highGoalAutoMissesSearch);
		$this->autoOther = mysqli_num_rows($autoBreachedOtherSearch);
		$this->autoLowBar = mysqli_num_rows($autoBreachedLowBarSearch);
		$this->lgma = mysqli_fetch_assoc($lowGoalMissesSearch);
		$this->lgha = mysqli_fetch_assoc($lowGoalHitsSearch);
		$this->hgma = mysqli_fetch_assoc($highGoalMissesSearch);
		$this->hgha = mysqli_fetch_assoc($highGoalHitsSearch); 
	}

	
}
?>