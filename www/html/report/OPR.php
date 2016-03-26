<?php



class advancedReport{

	private $numberOfTeams;
	private $objArray;
	private $teamData = array();

	private $portcullisArray = array();
	private $chevalDeFriseArray = array();
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
	private $breachArray = array();
		

	 function __construct(&$array){
	 	$this->objArray = $array;
	 	$this->numberOfTeams = count($this->objArray);

	 	           // Populates and sorts the arrays //
	 	foreach($this->objArray as $x => $x_value){
			$this->teamData[$x_value->team_number()] = $x_value->score_sum();
			$this->portcullisArray[$x_value->team_number()] = $x_value->portcullis_score();
			$this->chevalDeFriseArray[$x_value->team_number()] = $x_value->cheval_de_frise_score();
			$this->moatArray[$x_value->team_number()] = $x_value->moat_score();
			$this->rampartsArray[$x_value->team_number()] = $x_value->ramparts_score();
			$this->drawbridgeArray[$x_value->team_number()] = $x_value->drawbridge_score();
			$this->sallyPortArray[$x_value->team_number()] = $x_value->sally_port_score();
			$this->rockwallArray[$x_value->team_number()] = $x_value->rockwall_score();
			$this->roughTerrainArray[$x_value->team_number()] = $x_value->rough_terrain_score();
			$this->lowBarArray[$x_value->team_number()] = $x_value->low_bar_score();
			$this->highGoalArray[$x_value->team_number()] = $x_value->high_goal_score();
			$this->lowGoalArray[$x_value->team_number()] = $x_value->low_goal_score();
			$this->scaleArray[$x_value->team_number()] = $x_value->scale_score();
			$this->autoArray[$x_value->team_number()] = $x_value->auto_score();
			$this->foulArray[$x_value->team_number()] = $x_value->foul_score();
			$this->techFoulArray[$x_value->team_number()] = $x_value->tech_foul_score();
			$this->cardArray[$x_value->team_number()] = $x_value->card_score();
			$this->breachArray[$x_value->team_number()] = $x_value->breach_sum();
		}
		arsort($this->teamData);
		arsort($this->portcullisArray);
		arsort($this->chevalDeFriseArray);
		arsort($this->moatArray);
		arsort($this->rampartsArray);
		arsort($this->drawbridgeArray);
		arsort($this->sallyPortArray);
		arsort($this->rockwallArray);
		arsort($this->roughTerrainArray);
		arsort($this->lowBarArray);
		arsort($this->highGoalArray);
		arsort($this->lowGoalArray);
		arsort($this->scaleArray);
		arsort($this->autoArray);
		arsort($this->foulArray);
		arsort($this->techFoulArray);
		arsort($this->cardArray);
		arsort($this->breachArray);
	}
	public function number_of_teams(){
		return $this->numberOfTeams;
	}

	private function determine_precentile($data){
		$precentile = (100-(($data/$this->numberOfTeams)*100));
		if($data == 1){
			return "Rank 1 ";
		}elseif($precentile >= 95){
			return "top 5%, rank {$data} ";
		}elseif($precentile >= 90){
			return "top 10%, rank {$data} ";
		}elseif($precentile >= 75){
			return "top 25%, rank {$data} ";
		}elseif($precentile >= 50){
			return "top 50%, rank {$data} ";
		}elseif($precentile >= 25){
			return "bottom 50%, rank {$data} ";
		}else{
			return "bottom 25%, rank {$data} ";
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
		foreach($this->chevalDeFriseArray as $x => $x_value) {
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
		arsort($this->autoArray);
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
		
		 $data = "{$this->determine_precentile($this->auto_rank($team))}";
		 return $data;
	}

	public function scale_precentile($team){
		$data = "{$this->determine_precentile($this->scale_rank($team))}";
		return $data;
	}

	public function low_goal_precentile($team){
		$data = "{$this->determine_precentile($this->low_goal_rank($team))}";
		return $data;
	}

	public function high_goal_precentile($team){
		$data = "{$this->determine_precentile($this->high_goal_rank($team))}";
		return $data;
	}

	public function low_bar_precentile($team){
		$data = "low bar " . "{$this->determine_precentile($this->low_bar_rank($team))}";
		return $data;
	}

	public function rough_terrain_precentile($team){
		$data = "rough terrain " . "{$this->determine_precentile($this->rough_terrain_rank($team))}";
		return $data;
	}

	public function rockwall_precentile($team){
		$data = "rockwall " . "{$this->determine_precentile($this->rockwall_rank($team))}";
		return $data;
	}

	public function sally_port_precentile($team){
		$data = "sally port" . "{$this->determine_precentile($this->sally_port_rank($team))}";
		return $data;
	}

	public function drawbridge_precentile($team){
		$data = "drawbridge " . "{$this->determine_precentile($this->drawbridge_rank($team))}";
		return $data;
	}

	public function ramparts_precentile($team){
		$data = "ramparts " . "{$this->determine_precentile($this->ramparts_rank($team))}";
		return $data;
	}

	public function moat_precentile($team){
		$data = "moat " . "{$this->determine_precentile($this->moat_rank($team))}";
		return $data;
	}

	public function cheval_de_frise_precentile($team){
		$data = "cheval de frise " . "{$this->determine_precentile($this->cheval_de_frise_rank($team))}";
		return $data;
	}

	public function portcullis_precentile($team){
		$data = "portcullis " . "{$this->determine_precentile($this->portcullis_rank($team))}";
		return $data;
	}

	public function sum_precentile($team){
		$data = "{$this->determine_precentile($this->sum_rank($team))}";
		return $data;
	}


	public function rank_teams(){
		arsort($this->teamData);
		$it = 1;
		foreach($this->teamData as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it . ", Score=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on overall points scored

	public function raw_OPR(){
		foreach($this->teamData as $x => $x_value) {
		    echo "Key=" . $x . ", Value=" . $x_value;
		    echo "<br>";
		}
	} // [RETURNS] HTML Raw Report

	public function rank_by_breach(){
		arsort($this->breachArray);
		$it = 1;
		foreach($this->breachArray as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it . ", Score=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on defence points

	public function rank_by_high_goal_pts(){
		arsort($this->highGoalArray);
		$it = 1;
		foreach($this->highGoalArray as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it . ", Score=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on high goal points

	public function rank_by_low_goal_pts(){
		arsort($this->lowGoalArray);
		$it = 1;
		foreach($this->lowGoalArray as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it . ", Score=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on low goal points

	public function rank_by_auto_pts(){
		arsort($this->autoArray);
		$it = 1;
		foreach($this->autoArray as $x => $x_value) {
		    echo "Team=" . $x . ", Broken Rank=" . $x_value;//$it;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on auto points

	public function rank_by_cards(){
		arsort($this->cardArray);
		$it = 1;
		foreach($this->cardArray as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it . ", Score=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on red/yellow cards

	public function rank_by_scaling_pts(){
		arsort($this->scaleArray);
		$it = 1;
		foreach($this->scaleArray as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it . ", Score=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on red/yellow cards

	public function rank_cheval_de_frise_pts(){
		//arsort($this->chevalDeFriseArray);
		$it = 1;
		foreach($this->chevalDeFriseArray as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] Rank report of team based on red/yellow cards

	public function raw_low_bar(){
		//arsort($this->lowBarArray);
		$it = 1;
		foreach($this->lowBarArray as $x => $x_value) {
		    echo "Team=" . $x . ", Rank=" . $it . ", Score=" . $x_value;
		    echo "<br>";
		    $it++;
		}
	} // [RETURNS] HTML Raw Report

	/*public function low_goal_test($team){
		$count = (int) 1;
		$flag = false;
		$score = 0;
		foreach($this->objArray as $x => $x_value){
		   /* if($x == $team){
		    	$score = $x_value;
		    	$flag = true;
		    }
				
		    if(!$flag)
		    	$count++;*/
		    //echo $x_value->cheval_de_frise_score();
		//}
		//echo $score;

		
	//}





}
	

?>