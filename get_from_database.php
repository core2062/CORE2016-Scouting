<?php


class teamReport {
	
	public $team;


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

	public $autoBreachedSearch;
	public $autoReachedSearch;
	public $towerScaleSearch;
	public $towerChallengeSearch;


	public $MLGAS;
	public $autoLowGoalsMade;
	public $lowGoalAutoMisses;
	public $MHGAS;
	public $autoHighGoalsMade;
	public $highGoalAutoMisses;
	public $autoOther;
	public $autoLowBar;

	public $lgma;
	public $lgha;
	public $hgma;
	public $hgha; 

    function __construct($team) {
    	$this->team = $team;

		require('special_sqli_connect.php');

    	// Creates querys for the database
	
		$portcullisQuery = "SELECT SUM(categoryAScore) AS PortcullisCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryA` ='Portcullis'";
		$chevalDeFriseQuery = "SELECT SUM(categoryAScore) AS ChevalCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryA` ='Cheval de Frise'";
		$moatQuery = "SELECT SUM(categoryBScore) AS MoatCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryB` ='Moat'";
		$rampartsQuery = "SELECT SUM(categoryBScore) AS RampartCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryB` ='Ramparts'";
		$drawbridgeQuery = "SELECT SUM(categoryCScore) AS DrawbridgeCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryC` ='Drawbridge'";
		$sallyPortQuery = "SELECT SUM(categoryCScore) AS SallyPortCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryC` ='Sally Port'";
		$rockWallQuery = "SELECT SUM(categoryDScore) AS RockWallCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryD` ='Rock Wall'";
		$roughTerrainQuery = "SELECT SUM(categoryDScore) AS RoughTerrainCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryD` ='Rough Terrain'";
		$lowBarQuery = "SELECT SUM(lowBarScore) AS LowBarCrosses FROM `match` WHERE `team` = {$this->team}";
		
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


		$portcullisSearch = $dbc->query($portcullisQuery);
		$chevalDeFriseSearch = $dbc->query($chevalDeFriseQuery);
		$moatSearch = $dbc->query($moatQuery);
		$rampartsSearch = $dbc->query($rampartsQuery);
		$drawbridgeSearch = $dbc->query($drawbridgeQuery);
		$sallyPortSearch = $dbc->query($sallyPortQuery);
		$rockWallSearch = $dbc->query($rockWallQuery);
		$roughTerrainSearch = $dbc->query($roughTerrainQuery);
		$lowBarSearch = $dbc->query($lowBarQuery);

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
	
			// Varriables //

		$this->numberOfMatches = mysqli_num_rows($numMatchesSearch);

		$this->portcullisVar = mysqli_fetch_assoc($portcullisSearch);
		$this->chevalDeFriseVar = mysqli_fetch_assoc($chevalDeFriseSearch);
		$this->moatVar = mysqli_fetch_assoc($moatSearch);
		$this->rampartsVar = mysqli_fetch_assoc($rampartsSearch);
		$this->drawbridgeVar = mysqli_fetch_assoc($drawbridgeSearch);
		$this->sallyPortVar = mysqli_fetch_assoc($sallyPortSearch);
		$this->rockWallVar = mysqli_fetch_assoc($rockWallSearch);
		$this->roughTerrainVar = mysqli_fetch_assoc($roughTerrainSearch);
		$this->lowBarVar = mysqli_fetch_assoc($lowBarSearch);


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




		// Functions which return data //
/*
	public function search_test(){ // [NOTE] Very Important This is checked before using anything else!!!
		if($this->portcullisSearch && $this->chevalDeFriseSearch && $this->moatSearch && $this->rampartsSearch && 
		$this->drawbridgeSearch && $this->sallyPortSearch && $this->rockWallSearch && $this->roughTerrainSearch &&
		$this->lowBarSearch && $this->lowGoalHitsSearch && $this->lowGoalMissesSearch && $this->highGoalHitsSearch &&
		$this->highGoalMissesSearch && $this->towerScaleSearch && $this->noTowerScaleSearch && $this->numMatchesSearch &&
		$this->commentsSearch && $this->autoNoInteractionSearch && $this->autoBreachedSearch && $this->autoReachedSearch &&
		$this->autoBreachedLowBarSearch && $this->autoBreachedOtherSearch && $this->highGoalAutoShotsMadeSearch &&
		$this->highGoalAutoMissesSearch && $this->lowGoalAutoShotsMadeSearch && $this->lowGoalAutoMissesSearch &&
		$this->maxLowGoalAutoShotSearch && $this->maxHighGoalAutoShotSearch){
		} else{
			echo "Couldn't issue database query";
			echo mysqli_error($dbc);
		}
	} //[RETURNS] Bool
*/
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
		return "{$this->portcullisVar['PortcullisCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function cheval_de_frise_crosses(){
		return "{$this->chevalDeFriseVar['ChevalCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function moat_crosses(){
		return "{$this->moatVar['MoatCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function ramparts_crosses(){
		return "{$this->rampartsVar['RampartCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function drawbridge_crosses(){
		return "{$this->drawbridgeVar['DrawbridgeCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function sally_port_crosses(){
		return "{$this->sallyPortVar['SallyPortCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function rockwall_crosses(){
		return "{$this->rockWallVar['RockWallCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function rough_terrain_crosses(){
		return "{$this->roughTerrainVar['RoughTerrainCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
	public function low_bar_crosses(){
		return "{$this->lowBarVar['LowBarCrosses']}/{$this->numberOfMatches}";
	} // [RETURNS] STRING
		
		
		
};
// Close connection to the database
//mysqli_close($dbc);
// mysqli_num_rows()
//mysqli_fetch_lengths() Returns an array if integer that represents the size of each field (column)
// mysqli_fetch_array will return a row of data from the query until no further data is available

//todo:

?>
