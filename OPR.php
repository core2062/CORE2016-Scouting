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
		

	 function __construct(&$array){
	 	$this->objArray = $array;
	 	$this->numberOfTeams = count($this->objArray);

	 	foreach($this->objArray as $x => $x_value){
			$this->teamData[$x_value->team_number()] = $x_value->score_sum();
		}
		arsort($this->teamData);

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
	
	public function sum_precentile($team){
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
	public function display_i_precentile(){
		return determine_precentile($rank);
	}
	

	
	/*
	private function add_portcullis_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->portcullis_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_cheval_de_frise_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->cheval_de_frise_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_moat_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->moat_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_ramparts_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->ramparts_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_drawbridge_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->drawbridge_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_sally_port_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->sally_port_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_rockwall_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->rockwall_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_rough_terrain_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->rough_terrain_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	private function add_low_bar_score(){
		foreach($this->objArray as $x => $x_value){
			$old = $this->teamData[$x_value->team_number()];
			$new = $x_value->low_bar_score();
			$sum = $old + $new;
			$this->teamData[$x_value->team_number()] = $sum;
		}
	}
	public function calc_all(){
		$this->initialize_data_array();
		$this->add_portcullis_score();
		$this->add_cheval_de_frise_score();
		$this->add_moat_score();
		$this->add_ramparts_score();
		$this->add_drawbridge_score();
		$this->add_sally_port_score();
		$this->add_rockwall_score();
		$this->add_rough_terrain_score();
		$this->add_low_bar_score();
	}*/
	

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
//$OPRReport->initialize_data_array();
//$OPRReport->sum_score();
//$OPRReport->display_raw_OPR();
$OPRReport->rank_teams();
$OPRReport->sum_precentile(1);

?>