<?php



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
	private $foulArray = array();
	private $techFoulArray = array();
	private $cardArray = array();
		

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
		foreach($this->objArray as $x => $x_value){
			$this->foulData[$x_value->team_number()] = $x_value->foul_score();
		}
		arsort($this->foulArray);
		foreach($this->objArray as $x => $x_value){
			$this->techFoulArray[$x_value->team_number()] = $x_value->tech_foul_score();
		}
		arsort($this->techFoulArray);
		foreach($this->objArray as $x => $x_value){
			$this->cardArray[$x_value->team_number()] = $x_value->card_score();
		}
		arsort($this->cardArray);
	}
	public function number_of_teams(){
		return $this->numberOfTeams;
	}

	private function determine_precentile($data){
		$precentile = (100-(($data/$this->numberOfTeams)*100));
		if($data == 1){
			return "the best team";
		}elseif($precentile >= 95){
			return "in the top 5% of teams, rank {$data} ";
		}elseif($precentile >= 90){
			return "in the top 10% of teams, rank {$data} ";
		}elseif($precentile >= 75){
			return "in the top 25% of teams, rank {$data} ";
		}elseif($precentile >= 50){
			return "in the top 50% of teams, rank {$data} ";
		}elseif($precentile >= 25){
			return "in the bottom 50% of teams, rank {$data} ";
		}else{
			return "in the bottom 25% of teams, rank {$data} ";
		}
	}
	
	public function sum_rank($team){
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

	public function portcullis_rank($team){
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

	public function cheval_de_frise_rank($team){
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

	public function moat_rank($team){
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

	public function ramparts_rank($team){
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

	public function drawbridge_rank($team){
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

	public function sally_port_rank($team){
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

	public function rockwall_rank($team){
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

	public function rough_terrain_rank($team){
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

	public function low_bar_rank($team){
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

	public function high_goal_rank($team){
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

	public function low_goal_rank($team){
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

	public function scale_rank($team){
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

	public function auto_rank($team){
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

	public function card_rank($team){
		$count = (int) 1;
		$flag = false;
		foreach($this->cardArray as $x => $x_value) {
		    if($x == $team)
				$flag = true;
		    if(!$flag)
		    	$count++;
		}
		return $count;

	}

	public function card_precentile($team){
		return $this->determine_precentile($this->card_rank($team));
	}

	public function auto_precentile($team){
		return $this->determine_precentile($this->auto_rank($team));
	}

	public function scale_precentile($team){
		$data = "{$this->determine_precentile($this->scale_rank($team))}" . "for scaling points. ";
		return $data;
	}

	public function low_goal_precentile($team){
		$data = "{$this->determine_precentile($this->low_goal_rank($team))}" . "for low goal points. ";
		return $data;
	}

	public function high_goal_precentile($team){
		$data = "{$this->determine_precentile($this->high_goal_rank($team))}" . "for high goal points. ";
		return $data;
	}

	public function low_bar_precentile($team){
		$data = "{$this->determine_precentile($this->low_bar_rank($team))}" . "for low bar points. ";
		return $data;
	}

	public function rough_terrain_precentile($team){
		$data = "{$this->determine_precentile($this->rough_terrain_rank($team))}" . "for rough terrain points. ";
		return $data;
	}

	public function rockwall_precentile($team){
		$data = "{$this->determine_precentile($this->rockwall_rank($team))}" . "for rockwall points. ";
		return $data;
	}

	public function sally_port_precentile($team){
		$data = "{$this->determine_precentile($this->sally_port_rank($team))}" . "for sally port points. ";
		return $data;
	}

	public function drawbridge_precentile($team){
		$data = "{$this->determine_precentile($this->drawbridge_rank($team))}" . "for drawbridge points. ";
		return $data;
	}

	public function ramparts_precentile($team){
		$data = "{$this->determine_precentile($this->ramparts_rank($team))}" . "for ramparts points. ";
		return $data;
	}

	public function moat_precentile($team){
		$data = "{$this->determine_precentile($this->moat_rank($team))}" . "for moat points. ";
		return $data;
	}

	public function cheval_de_frise_precentile($team){
		$data = "{$this->determine_precentile($this->cheval_de_frise_rank($team))}" . "for cheval de frise points. ";
		return $data;
	}

	public function portcullis_precentile($team){
		$data = "{$this->determine_precentile($this->portcullis_rank($team))}" . "for portcullis points. ";
		return $data;
	}

	public function sum_precentile($team){
		$data = "{$this->determine_precentile($this->sum_rank($team))}" . "overall. ";
		return $data;
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

	public function raw_OPR(){
		foreach($this->teamData as $x => $x_value) {
		    echo "Key=" . $x . ", Value=" . $x_value;
		    echo "<br>";
		}
	} // [RETURNS] HTML Raw Report
}

?>