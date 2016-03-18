<?php
include 'get_from_database.php';
$objArray = array();
$teamNumberArray = array();


require_once('SQLi_connect.php');
$Query = "SELECT DISTINCT team FROM `match`";
$Search = $dbc->query($Query);


while($row = mysqli_fetch_assoc($Search)){
	foreach($row as $x => $x_value) {
		$teamNumberArray[] = $x_value;
	}
}
foreach($teamNumberArray as $y => $y_value){
	$objArray[] = new teamReport($y_value);
}


class advancedReport{

	private $numberOfTeams;
	private $objArray;
	private $teamData = array();

	private $portcullisArray = array();
	private $chevalDefriseArray = array();
	private $moatArray = array();
	private $rampartsArray = array();
	private $drawbridgeArray = array();
	private $sallyPortArray = array();
	private $rockwallArray = array();
	private $roughTerrainArray = array();
	private $lowBarArray = array();
	private $highGoalArray = array();
	private $lowGoalArray = array();
	private $scaleArray = array();
	private $autoArray = array();
		

	 function __construct(&$array){
	 	$this->objArray = $array;
	 	$this->numberOfTeams = count($this->objArray);

	 	           // Populates and sorts the arrays //
	 	foreach($this->objArray as $x => $x_value){
			$this->teamData[$x_value->team_number()] = $x_value->score_sum();
		}
		arsort($this->teamData);
		foreach($this->objArray as $x => $x_value){
			$this->portcullisArray[$x_value->team_number()] = $x_value->portcullis_score();
		}
		arsort($this->portcullisArray);
		foreach($this->objArray as $x => $x_value){
			$this->chevalDeFriseArray[$x_value->team_number()] = $x_value->cheval_de_frise_score();
		}
		arsort($this->chevalDeFriseArray);
		foreach($this->objArray as $x => $x_value){
			$this->moatArray[$x_value->team_number()] = $x_value->moat_score();
		}
		arsort($this->moatArray);
		foreach($this->objArray as $x => $x_value){
			$this->rampartsArray[$x_value->team_number()] = $x_value->ramparts_score();
		}
		arsort($this->rampartsArray);
		foreach($this->objArray as $x => $x_value){
			$this->drawbridgeArray[$x_value->team_number()] = $x_value->drawbridge_score();
		}
		arsort($this->drawbridgeArray);
		foreach($this->objArray as $x => $x_value){
			$this->sallyPortArray[$x_value->team_number()] = $x_value->sally_port_score();
		}
		arsort($this->sallyPortArray);
		foreach($this->objArray as $x => $x_value){
			$this->rockwallArray[$x_value->team_number()] = $x_value->rockwall_score();
		}
		arsort($this->rockwallArray);
		foreach($this->objArray as $x => $x_value){
			$this->roughTerrainArray[$x_value->team_number()] = $x_value->rough_terrain_score();
		}
		arsort($this->roughTerrainArray);
		foreach($this->objArray as $x => $x_value){
			$this->lowBarArray[$x_value->team_number()] = $x_value->low_bar_score();
		}
		arsort($this->lowBarArray);
		foreach($this->objArray as $x => $x_value){
			$this->highGoalArray[$x_value->team_number()] = $x_value->high_goal_score();
		}
		arsort($this->highGoalArray);
		foreach($this->objArray as $x => $x_value){
			$this->lowGoalArray[$x_value->team_number()] = $x_value->low_goal_score();
		}
		arsort($this->lowGoalArray);
		foreach($this->objArray as $x => $x_value){
			$this->scaleArray[$x_value->team_number()] = $x_value->scale_score();
		}
		arsort($this->scaleArray);
		foreach($this->objArray as $x => $x_value){
			$this->autoArray[$x_value->team_number()] = $x_value->auto_score();
		}
		arsort($this->autoArray);
	}

	private function determine_precentile($data){
		// $precent = $data/$this->numberOfTeams;
		if($data == 1){
			return "the best team";
		}elseif($data >= ($this->numberOfTeams / 20)){
			return "in the top 5% of teams";
		}elseif($data >= ($this->numberOfTeams / 10)){
			return "in the top 10% of teams";
		}elseif($data >= ($this->numberOfTeams / 4)){
			return "in the top 25% of teams";
		}elseif($data >= ($this->numberOfTeams / 2)){
			return "in the top 50% of teams";
		}elseif($data >= ($this->numberOfTeams / (4/3))){
			return "in the bottom 50% of teams";
		}else{
			return "in the bottom 25% of teams";
		}
	}
	
	private function sum_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->teamData as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function portcullis_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->portcullisArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function cheval_de_frise_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->chevalDefriseArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function moat_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->moatArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function ramparts_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->rampartsArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function drawbridge_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->drawbridgeArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function sally_port_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->sallyPortArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function rockwall_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->rockwallArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function rough_terrain_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->roughTerrainArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function low_bar_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->lowBarArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function high_goal_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->highGoalArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function low_goal_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->lowGoalArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function scale_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->scaleArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	private function auto_precentile($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->autoArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	public function display_auto_precentile($team){
		return $this->determine_precentile($this->auto_precentile($team));
	}

	public function display_scale_precentile($team){
		return $this->determine_precentile($this->scale_precentile($team));
	}

	public function display_low_goal_precentile($team){
		return $this->determine_precentile($this->low_goal_precentile($team));
	}

	public function display_high_goal_precentile($team){
		return $this->determine_precentile($this->high_goal_precentile($team));
	}

	public function display_low_bar_precentile($team){
		return $this->determine_precentile($this->low_bar_precentile($team));
	}

	public function display_rough_terrain_precentile($team){
		return $this->determine_precentile($this->rough_terrain_precentile($team));
	}

	public function display_rockwall_precentile($team){
		return $this->determine_precentile($this->rockwall_precentile($team));
	}

	public function display_sally_port_precentile($team){
		return $this->determine_precentile($this->sally_port_precentile($team));
	}

	public function display_drawbridge_precentile($team){
		return $this->determine_precentile($this->drawbridge_precentile($team));
	}

	public function display_ramparts_precentile($team){
		return $this->determine_precentile($this->ramparts_precentile($team));
	}

	public function display_moat_precentile($team){
		return $this->determine_precentile($this->moat_precentile($team));
	}

	public function display_cheval_de_frise_precentile($team){
		return $this->determine_precentile($this->cheval_de_frise_precentile($team));
	}

	public function display_portcullis_precentile($team){
		return $this->determine_precentile($this->portcullis_precentile($team));
	}

	public function display_sum_precentile($team){
		return $this->determine_precentile($this->sum_precentile($team));
	}
	


	public function rank_teams(){
		arsort($this->teamData);
		$it = 1;
		foreach($this->teamData as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it;
		    echo "<br>";
		    $it++;
		}
	}

	public function display_raw_OPR(){
		foreach($this->teamData as $x => $x_value) {
		    echo "Key=" . $x . ", Value=" . $x_value;
		    echo "<br>";
		}
	} // [RETURNS] HTML Raw Report
}
$OPRReport = new advancedReport($objArray);
$OPRReport->rank_teams();
echo "{$OPRReport->display_sum_precentile(1)}";

?>