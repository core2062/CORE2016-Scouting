<?php
class report {
	public $team;
	//public $portcullisVar;
	//public $numberOfMatches;
	public $moatSearch;
	public $numMoatMatches;

	function __construct($team) {
		$this->team = $team;
		require_once('SQLi_connect.php');
		$moatQuery = "SELECT categoryBScore FROM `match` WHERE `team` = {$this->team} AND `categoryB` ='Moat'";
		//$numMatchesQuery = "SELECT team FROM `match` WHERE `team` = {$this->team}";
		$this->moatSearch = $dbc->query($moatQuery);
		//$this->numberOfMatches = mysqli_num_rows($numMatchesSearch);
		$this->numMoatMatches = mysqli_num_rows($this->moatSearch);
	}	
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
		
	}
	
	private function defence_crosses($defsearch, $defnum){
		if($defnum >= 1){
			return "{$this->query_sum($defsearch)}/{$defnum}";
		} else {
			return "0/{$defnum}";
		}
	}
	public function sum_moat(){
		return $this->defence_crosses($this->moatSearch, $this->numMoatMatches);
	} 
	//public function returnShiz(){
	//	return $this->portcullisVar["PortcullisCrosses"];
	//}
	//public function returnShizzz(){
	//	return $this->numberOfMatches;
	//}
}
$teamObject = new report(2062);
echo $teamObject->sum_moat();
//echo $teamObject->numMoatMatches;
//echo $teamObject->returnShiz();
//echo $teamObject->returnShizzz();
?>