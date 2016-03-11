<?php


class teamReport {
	
	public $team;

	private $searchError = false;

/*
	public $numberOfMatches;
	public $portcullisVar;
	public $chevalDeFriseVar;
	public $moatVar;
	public $rampartsVar;
	public $drawbridgeVar;
	public $sallyPortVar;
	public $rockWallVar;
	public $roughTerrainVar;
	public $lowBarVar;
	*/

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

    function __construct($team) {
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
		//$commentsQuery = "SELECT comments FROM `match` WHERE `team` = {$this->team} AND `comments` != 'N/A'";

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
		//$commentsSearch = $dbc->query($commentsQuery);

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

		    // Search Test
		if(!($portcullisSearch && $chevalDeFriseSearch && $moatSearch && $rampartsSearch && 
		$drawbridgeSearch && $sallyPortSearch && $rockWallSearch && $roughTerrainSearch &&
		$lowBarSearch && $lowGoalHitsSearch && $lowGoalMissesSearch && $highGoalHitsSearch &&
		$highGoalMissesSearch && $towerScaleSearch && $noTowerScaleSearch && $numMatchesSearch &&
		$commentsSearch && $autoNoInteractionSearch && $autoBreachedSearch && $autoReachedSearch &&
		$autoBreachedLowBarSearch && $autoBreachedOtherSearch && $highGoalAutoShotsMadeSearch &&
		$highGoalAutoMissesSearch && $lowGoalAutoShotsMadeSearch && $lowGoalAutoMissesSearch &&
		$maxLowGoalAutoShotSearch && $maxHighGoalAutoShotSearch)){
			$this->searchError = true;
			echo "Couldn't issue database query/'s";
			echo mysqli_error($dbc);
		}
	
			// Varriables //

		$this->numberOfMatches = mysqli_num_rows($numMatchesSearch);
/*
		$this->portcullisVar = mysqli_fetch_assoc($portcullisSearch);
		$this->chevalDeFriseVar = mysqli_fetch_assoc($chevalDeFriseSearch);
		$this->moatVar = mysqli_fetch_assoc($moatSearch);
		$this->rampartsVar = mysqli_fetch_assoc($rampartsSearch);
		$this->drawbridgeVar = mysqli_fetch_assoc($drawbridgeSearch);
		$this->sallyPortVar = mysqli_fetch_assoc($sallyPortSearch);
		$this->rockWallVar = mysqli_fetch_assoc($rockWallSearch);
		$this->roughTerrainVar = mysqli_fetch_assoc($roughTerrainSearch);
		$this->lowBarVar = mysqli_fetch_assoc($lowBarSearch);
*/
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

	public function check_error(){
		return $searchError;
	}


		// Functions which return data //

	private function query_sum($search){
		$total = 0;
		$numRows = 0;
		while($row = mysqli_fetch_assoc($search)){
			$numRows += 1;
			foreach ($row as $key => $value){
				$total += $value;
			}
		}
		if($numRows != 0){
			return $total;
		} else {
			return 0;
		}
	} //[RETURNS] Query data sum

	private function defence_crosses($defsearch, $defnum){
		if($defnum >= 1){
			return "{$this->query_sum($defsearch)}/{$defnum}";
		} else {
			return "0/{$defnum}";
		}
	} // [RETURNS] Defence report

	public function auto_low_goals(){
		
		$totalAutoLowGoalShots = $this->autoLowGoalsMade['LGAutoMade'] + $this->lowGoalAutoMisses['LGAutoMisses'];

		if($this->MLGAS['LGAutoMax'] > 1){
			return "{$this->autoLowGoalsMade['LGAutoMade']}/{$totalAutoLowGoalShots}(Can Make {$this->MLGAS['LGAutoMax']} Shots in Auto)";
		} else {
			return "{$this->autoLowGoalsMade['LGAutoMade']}/{$totalAutoLowGoalShots}";
		}
	} //[RETURNS] STRING

	public function auto_high_goals(){

		$totalAutoHighGoalShots = $this->autoHighGoalsMade['HGAutoMade'] + $this->highGoalAutoMisses['HGAutoMisses'];

		if($this->MHGAS['HGAutoMax'] > 1){
			return "{$this->autoHighGoalsMade['HGAutoMade']}/{$totalAutoHighGoalShots}(Can Make {$this->MHGAS['HGAutoMax']} Shots in Auto)";
		} else {
			return "{$this->autoHighGoalsMade['HGAutoMade']}/{$totalAutoHighGoalShots}";
		}
	} //[RETURNS] STRING
	
	public function highest_auto_movement(){
		if(mysqli_num_rows($this->autoBreachedSearch) >= 1){
			return 'Breach';
		} elseif(mysqli_num_rows($this->autoReachedSearch) >= 1) {
			return 'Reach';
		} else {
			return 'No Interaction';
		}
	} //[RETURNS] STRING
	
	public function auto_times_breached(){ // [NOTE] Displays Times crossed low bar : times crossed everything else
		if($this->autoLowBar > 0){
			return "{$this->autoLowBar} : {$this->autoOther}";
		} elseif($this->autoOther > 0) {
			return "{$this->autoLowBar} : {$this->autoOther}";
		} else {
			return "0 : 0";
		}
	} //[RETURNS] STRING

	public function times_scaled(){
		$numScale = mysqli_num_rows($this->towerScaleSearch);
		if($numScale > 0){
			return "{$numScale}/{$this->numberOfMatches}";
		} else {
			return "N/A";
		}
	} //[RETURNS] STRING
	
	public function times_challenged(){
		$numChallenge = mysqli_num_rows($this->towerChallengeSearch);
		if($numChallenge > 0){
			return "{$numChallenge}/{$this->numberOfMatches}";
		} else {
			return "N/A";
		}
	} //[RETURNS] STRING
		

		// [NOTE] May have to fix having 2 lgha, lowgoalhits, hgha, highgoalhits in following functions


	public function low_goal_accuracy(){
		$lowGoalHits = $this->lgha['LowGoalHits'];
		$lowGoalMisses = $this->lgma['LowGoalMisses'];
		$totalLowGoalShots = ($lowGoalHits+$lowGoalMisses);
		if($totalLowGoalShots > 0){
			$lowGoalAccuracy = (($lowGoalHits/$totalLowGoalShots)*100);
			$lowGoalAccuracy = round($lowGoalAccuracy, 1, PHP_ROUND_HALF_UP); 
			return "({$lowGoalAccuracy}%)"; // [MAYBE ADDED] {$this->lowGoalHits}/{$this->totalLowGoalShots} 
		} else {
			return "N/A";
		}
	} // [RETURNS] STRING

	public function avg_low_goal_shots_per_match(){
		$lowGoalHits = $this->lgha['LowGoalHits'];
		$lowGoalAccuracyFraction = ($lowGoalHits/$this->numberOfMatches); 
		$lowGoalAccuracyFraction = round($lowGoalAccuracyFraction, 1, PHP_ROUND_HALF_UP);
		return $lowGoalAccuracyFraction;
	} // [RETURNS] FLOAT (1'st decimal place)
		

		
	public function high_goal_accuracy(){
		$highGoalHits = $this->hgha['HighGoalHits'];
		$highGoalMisses = $this->hgma['HighGoalMisses'];
		$totalHighGoalShots = ($highGoalHits+$highGoalMisses);
		if($totalHighGoalShots > 0){
			$highGoalAccuracy = (($highGoalHits/$totalHighGoalShots)*100); 
			$highGoalAccuracy = round($highGoalAccuracy, 1, PHP_ROUND_HALF_UP);
			return "({$highGoalAccuracy}%)"; //[MAYBE ADDED] {$this->highGoalHits}/{$this->totalHighGoalShots} 
		} else {
			return "N/A";
		}
	} // [RETURNS] STRING

	public function avg_high_goal_shots_per_match(){
		$highGoalHits = $this->hgha['HighGoalHits'];
		$highGoalAccuracyFraction = ($highGoalHits/$this->numberOfMatches); 
		$highGoalAccuracyFraction = round($highGoalAccuracyFraction, 1, PHP_ROUND_HALF_UP);
		return $highGoalAccuracyFraction;
	} // [RETURNS] FLOAT (1'st decimal place)


	public function portcullis_crosses(){
		return $this->defence_crosses($this->portcullisSearch, $this->numportcullis);
	} // [RETURNS] STRING
	public function cheval_de_frise_crosses(){
		return $this->defence_crosses($this->chevalDeFriseSearch, $this->numchevalDeFrise);
	} // [RETURNS] STRING
	public function moat_crosses(){
		return $this->defence_crosses($this->moatSearch, $this->nummoat);
	} // [RETURNS] STRING
	public function ramparts_crosses(){
		return $this->defence_crosses($this->rampartsSearch, $this->numramparts);
	} // [RETURNS] STRING
	public function drawbridge_crosses(){
		return $this->defence_crosses($this->drawbridgeSearch, $this->numdrawbridge);
	} // [RETURNS] STRING
	public function sally_port_crosses(){
		return $this->defence_crosses($this->sallyPortSearch, $this->numsallyPort);
	} // [RETURNS] STRING
	public function rockwall_crosses(){
		return $this->defence_crosses($this->rockWallSearch, $this->numrockWall);
	} // [RETURNS] STRING
	public function rough_terrain_crosses(){
		return $this->defence_crosses($this->roughTerrainSearch, $this->numroughTerrain);
	} // [RETURNS] STRING
	public function low_bar_crosses(){
		return $this->defence_crosses($this->lowBarSearch, $this->numlowBar);
	} // [RETURNS] STRING
		
		
		
};
// Close connection to the database
//mysqli_close($dbc);
// mysqli_num_rows()
//mysqli_fetch_lengths() Returns an array if integer that represents the size of each field (column)
// mysqli_fetch_array will return a row of data from the query until no further data is available

//todo:

?>
