<?php
require_once('../mysqli_connect.php');

class teamReport {
	public $team;
    function __construct($team) {
    	$this->team = $team;


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
		$commentsQuery = "SELECT comments FROM `match` WHERE `team` = {$this->team} AND `comments` != 'N/A'";

		$autoBreachedQuery = "SELECT autoDefence FROM `match` WHERE `team` = {$this->team} AND `autoDefence` ='Breached'";
		$autoReachedQuery = "SELECT autoDefence FROM `match` WHERE `team` = {$this->team} AND `autoDefence` ='Reached'";
		$autoBreachedLowBarQuery = "SELECT breachDefence FROM `match` WHERE `team` = {$this->team} AND `autoDefence` ='Low Bar'";
		$autoBreachedOtherQuery = "SELECT breachDefence FROM `match` WHERE `team` = {$this->team} AND `autoDefence` ='Other'";
		$highGoalAutoShotsMadeQuery = "SELECT SUM(highGoalAutoShotsMade) AS HGAutoMade FROM `match` WHERE `team` = {$this->team}";
		$highGoalAutoMissesQuery = "SELECT highGoalAutoMisses AS HGAutoMisses FROM `match` WHERE `team` = {$this->team}";
		$lowGoalAutoShotsMadeQuery = "SELECT SUM(lowGoalAutoShotsMade) AS LGAutoMade FROM `match` WHERE `team` = {$this->team}";
		$lowGoalAutoMissesQuery = "SELECT lowGoalAutoMisses AS LGAutoMisses FROM `match` WHERE `team` = {$this->team}";
		$maxHighGoalAutoShotQuery = "SELECT MAX(highGoalAutoShotsMade) AS HGAutoMax FROM `match` WHERE `team` = {$this->team}";
		$maxLowGoalAutoShotQuery = "SELECT MAX(lowGoalAutoShotsMade) AS LGAutoMax FROM `match` WHERE `team` = {$this->team}";

		// Searching Database for what we need //

		$portcullisSearch = @mysqli_query($dbc, $this->portcullisQuery);
		$chevalDeFriseSearch = @mysqli_query($dbc, $this->chevalDeFriseQuery);
		$moatSearch = @mysqli_query($dbc, $this->moatQuery);
		$rampartsSearch = @mysqli_query($dbc, $this->rampartsQuery);
		$drawbridgeSearch = @mysqli_query($dbc, $this->drawbridgeQuery);
		$sallyPortSearch = @mysqli_query($dbc, $this->sallyPortQuery);
		$rockWallSearch = @mysqli_query($dbc, $this->rockWallQuery);
		$roughTerrainSearch = @mysqli_query($this->dbc, $roughTerrainQuery);
		$lowBarSearch = @mysqli_query($dbc, $this->lowBarQuery);

		$lowGoalHitsSearch = @mysqli_query($dbc, $this->lowGoalHitsQuery);
		$lowGoalMissesSearch = @mysqli_query($dbc, $this->lowGoalMissesQuery);
		$highGoalHitsSearch = @mysqli_query($dbc, $this->highGoalHitsQuery);
		$highGoalMissesSearch = @mysqli_query($dbc, $this->highGoalMissesQuery);
		$towerScaleSearch = @mysqli_query($dbc, $this->towerScaleQuery);
		$towerChallengeSearch = @mysqli_query($dbc, $this->towerChallengeQuery);

		$numMatchesSearch = @mysqli_query($dbc, $this->numMatchesQuery);
		$commentsSearch = @mysqli_query($dbc, $this->commentsQuery);

		$autoBreachedSearch = @mysqli_query($dbc, $this->autoBreachedQuery);
		$autoReachedSearch = @mysqli_query($dbc, $this->autoReachedQuery);
		$autoBreachedLowBarSearch = @mysqli_query($dbc, $this->autoBreachedLowBarQuery);
		$autoBreachedOtherSearch = @mysqli_query($dbc, $this->autoBreachedOtherQuery);
		$highGoalAutoShotsMadeSearch = @mysqli_query($dbc, $this->highGoalAutoShotsMadeQuery);
		$highGoalAutoMissesSearch = @mysqli_query($dbc, $this->highGoalAutoMissesQuery);
		$lowGoalAutoShotsMadeSearch = @mysqli_query($dbc, $this->lowGoalAutoShotsMadeQuery);
		$lowGoalAutoMissesSearch = @mysqli_query($dbc, $this->lowGoalAutoMissesQuery);
		$maxHighGoalAutoShotSearch = @mysqli_query($dbc, $this->maxHighGoalAutoShotQuery);
		$maxLowGoalAutoShotSearch = @mysqli_query($dbc, $this->maxLowGoalAutoShotQuery);
	}

		// Varriables //

	private $numberOfMatches = mysqli_num_rows($this->numMatchesSearch);

	private $portcullisVar = mysqli_fetch_assoc($this->portcullisSearch);
	private $chevalDeFriseVar = mysqli_fetch_assoc($this->chevalDeFriseSearch);
	private $moatVar = mysqli_fetch_assoc($this->moatSearch);
	private $rampartsVar = mysqli_fetch_assoc($this->rampartsSearch);
	private $drawbridgeVar = mysqli_fetch_assoc($this->drawbridgeSearch);
	private $sallyPortVar = mysqli_fetch_assoc($this->sallyPortSearch);
	private $rockWallVar = mysqli_fetch_assoc($this->rockWallSearch);
	private $roughTerrainVar = mysqli_fetch_assoc($this->roughTerrainSearch);
	private $lowBarVar = mysqli_fetch_assoc($this->lowBarSearch);

	 





		// Functions which return data //

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

	public function auto_low_goals(){
		$MLGAS = mysqli_fetch_assoc($this->maxLowGoalAutoShotSearch);
		$autoLowGoalsMade = mysqli_fetch_assoc($this->lowGoalAutoShotsMadeSearch);
		$totalAutoLowGoalShots = mysqli_fetch_assoc($this->lowGoalAutoShotsMadeSearch) + mysqli_fetch_assoc($this->lowGoalAutoMissesSearch);

		if($this->MLGAS['LGAutoMax'] > 1){
			return "{$this->autoLowGoalsMade}/{$this->totalAutoLowGoalShots}(Can Make {$this->MHGAS} Shots in Auto)";
		} else {
			return "{$this->autoLowGoalsMade}/{$this->totalAutoLowGoalShots}";
		}
	} //[RETURNS] STRING

	public function auto_high_goals(){
		$MHGAS = mysqli_fetch_assoc($this->maxHighGoalAutoShotSearch);
		$autoHighGoalsMade = mysqli_fetch_assoc($this->highGoalAutoShotsMadeSearch);
		$totalAutoHighGoalShots = mysqli_fetch_assoc($this->highGoalAutoShotsMadeSearch) + mysqli_fetch_assoc($this->highGoalAutoMissesSearch);

		if($this->MHGAS['HGAutoMax'] > 1){
			return "{$this->autoHighGoalsMade}/{$this->totalAutoHighGoalShots}(Can Make {$this->MHGAS} Shots in Auto)";
		} else {
			return "{$this->autoHighGoalsMade}/{$this->totalAutoHighGoalShots}";
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
		$autoOther = mysqli_num_rows($this->autoBreachedOtherSearch);
		$autoLowBar = mysqli_num_rows($this->autoBreachedLowBarSearch);
		if(mysqli_num_rows($this->autoBreachedSearch) >= 1){
			if(mysqli_num_rows($this->autoBreachedLowBarSearch) >= 1 || mysqli_num_rows($this->autoBreachedOtherSearch) >= 1){
				return "{$this->autoLowBar} : {$this->autoOther}";
			}
		} else {
			return "0";
		}
	} //[RETURNS] STRING

	public function times_scaled(){
		$numScale = mysqli_num_rows($this->towerScaleSearch);
		if($this->numScale > 0){
			return "{$this->numScale}/{$this->numberOfMatches}";
		} else {
			return "N/A";
		}
	} //[RETURNS] STRING
	
	public function times_challenged(){
		$numChallenge = mysqli_num_rows($this->towerChallengeSearch);
		if($this->numChallenge > 0){
			return "{$this->numChallenge}/{$this->numberOfMatches}";
		} else {
			return "N/A";
		}
	} //[RETURNS] STRING
		

		// [NOTE] May have to fix having 2 lgha, lowgoalhits, hgha, highgoalhits in following functions


	public function low_goal_accuracy(){
		$lgha = mysqli_fetch_assoc($this->lowGoalHitsSearch);
		$lowGoalHits = $this->lgha['LowGoalHits'];
		$lgma = mysqli_fetch_assoc($lowGoalMissesSearch); 
		$lowGoalMisses = $this->lgma['LowGoalMisses'];
		$totalLowGoalShots = ($this->lowGoalHits+$this->lowGoalMisses);
		$lowGoalAccuracy = (($this->lowGoalHits/$this->totalLowGoalShots)*100);
		$this->lowGoalAccuracy = round($this->lowGoalAccuracy, 1, PHP_ROUND_HALF_UP); 
		return "({$this->lowGoalAccuracy}%)"; // [MAYBE ADDED] {$this->lowGoalHits}/{$this->totalLowGoalShots} 
	} // [RETURNS] STRING

	public function avg_low_goal_shots_per_match(){
		$lgha = mysqli_fetch_assoc($this->lowGoalHitsSearch);
		$lowGoalHits = $this->lgha['LowGoalHits'];
		$lowGoalAccuracyFraction = ($this->lowGoalHits/$this->numberOfMatches); 
		$this->lowGoalAccuracyFraction = round($this->lowGoalAccuracyFraction, 1, PHP_ROUND_HALF_UP);
		return $this->lowGoalAccuracyFraction;
	} // [RETURNS] FLOAT (1'st decimal place)
		

		
	public function high_goal_accuracy(){
		$hgha = mysqli_fetch_assoc($this->highGoalHitsSearch); 
		$highGoalHits = $this->hgha['HighGoalHits'];
		$hgma = mysqli_fetch_assoc($this->highGoalMissesSearch); 
		$highGoalMisses = $this->hgma['HighGoalMisses'];
		$totalHighGoalShots = ($this->highGoalHits+$this->highGoalMisses);
		$highGoalAccuracy = (($this->highGoalHits/$this->totalHighGoalShots)*100); 
		$this->highGoalAccuracy = round($this->highGoalAccuracy, 1, PHP_ROUND_HALF_UP);
		return "({$this->highGoalAccuracy}%)"; //[MAYBE ADDED] {$this->highGoalHits}/{$this->totalHighGoalShots} 
	} // [RETURNS] STRING

	public function avg_high_goal_shots_per_match(){
		$hgha = mysqli_fetch_assoc($this->highGoalHitsSearch); 
		$highGoalHits = $this->hgha['HighGoalHits'];
		$highGoalAccuracyFraction = ($this->highGoalHits/$this->numberOfMatches); 
		$this->highGoalAccuracyFraction = round($this->highGoalAccuracyFraction, 1, PHP_ROUND_HALF_UP);
		return $this->highGoalAccuracyFraction;
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
mysqli_close($dbc);
// mysqli_num_rows()
//mysqli_fetch_lengths() Returns an array if integer that represents the size of each field (column)
// mysqli_fetch_array will return a row of data from the query until no further data is available

//todo:

?>
