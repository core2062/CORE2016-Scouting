<?php
class report {
	public $team;
	public $portcullisVar;
	public $numberOfMatches;

	function __construct($team) {
		$this->team = $team;
		require_once('special_sqli_connect.php');
		//require_once('sqli_connect.php');
		//$portcullisQuery = "SELECT SUM(categoryAScore) AS PortcullisCrosses FROM `match` WHERE `team` = {$this->team} AND `categoryA` ='Portcullis'";
		$numMatchesQuery = "SELECT team FROM `match` WHERE `team` = {$this->team}";
		//$portcullisSearch = $dbc->query($portcullisQuery);
		$numMatchesSearch = $dbc->query($numMatchesQuery);
		//$this->portcullisVar = mysqli_fetch_assoc($portcullisSearch);
		$this->numberOfMatches = mysqli_num_rows($numMatchesSearch);
	}	
	public function returnShiz(){
		return $this->portcullisVar["PortcullisCrosses"];
	}
	public function returnShizzz(){
		return $this->numberOfMatches;
	}
}
$teamObject = new report(2077);
//echo $teamObject->returnShiz();
echo $teamObject->returnShizzz();
?>