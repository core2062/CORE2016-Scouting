<?php
//include 'get_from_database.php';
include "OPR.php";

$objArray = array();
$teamNumberArray = array();

require('/var/www/sqli_connect.php');
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

$OPRReport = new advancedReport($objArray);
//$OPRReport->rank_teams();
//echo "{$OPRReport->sum_precentile(299299)}";

class showAdvancedReport{

	private $team;
	private $OPRReport;

	private $autopts;
	private $lowBar;
	private $roughTerrain;
	private $rockwall;
	private $sallyPort;
	private $drawbridge;
	private $ramparts;
	private $moat;
	private $chevalDeFrise;
	private $portcullis;

	private $rank1 = 0;
	private $rank2 = 0;
	private $rank3 = 0;
	private $rank1Name;
	private $rank2Name;
	private $rank3Name;
	private $goalName;
	private $scale;
	private $wrank1;


	function __construct($team, advancedReport &$OPRReport){
		$this->team = $team;
		$this->OPRReport = $OPRReport;

		$this->autopts = $OPRReport->auto_precentile($team);
		$this->lowBar = $OPRReport->low_bar_rank($team);
		$this->roughTerrain = $OPRReport->rough_terrain_rank($team);
		$this->rockwall = $OPRReport->rockwall_rank($team);
		$this->sallyPort = $OPRReport->sally_port_rank($team);
		$this->drawbridge = $OPRReport->drawbridge_rank($team);
		$this->ramparts = $OPRReport->ramparts_rank($team);
		$this->moat = $OPRReport->moat_rank($team);
		$this->chevalDeFrise = $OPRReport->cheval_de_frise_rank($team);
		$this->portcullis = $OPRReport->portcullis_rank($team);


	}

	public function display_worst_rank(){
		$this->wrank1 = max($this->lowBar, $this->roughTerrain, $this->rockwall, $this->sallyPort, $this->drawbridge, $this->ramparts, $this->moat, $this->chevalDeFrise, $this->portcullis);
		if($this->wrank1 == $this->lowBar) {
			$this->lowBar = 99;
			return $this->OPRReport->low_bar_precentile($this->team);
		} elseif($this->wrank1 == $this->roughTerrain){
			$this->roughTerrain = 99;
			return $this->OPRReport->rough_terrain_precentile($this->team);
		} elseif($this->wrank1 == $this->rockwall){
			$this->rockwall = 99;
			return $this->OPRReport->rockwall_precentile($this->team);
		} elseif($this->wrank1 == $this->sallyPort){
			$this->sallyPort = 99;
			return $this->OPRReport->sally_port_precentile($this->team);
		} elseif($this->wrank1 == $this->drawbridge){
			$this->drawbridge = 99;
			return $this->OPRReport->drawbridge_precentile($this->team);
		} elseif($this->wrank1 == $this->ramparts){
			$this->ramparts = 99;
			return $this->OPRReport->ramparts_precentile($this->team);
		} elseif($this->wrank1 == $this->moat){
			$this->moat = 99;
			return $this->OPRReport->moat_precentile($this->team);
		} elseif($this->wrank1 == $this->chevalDeFrise){
			$this->chevalDeFrise = 99;
			return $this->OPRReport->cheval_de_frise_precentile($this->team);
		} else{
			$this->portcullis = 99;
			return $this->OPRReport->portcullis_precentile($this->team);
		}
	}

	public function display_top_rank(){
		$this->rank1 = min($this->lowBar, $this->roughTerrain, $this->rockwall, $this->sallyPort, $this->drawbridge, $this->ramparts, $this->moat, $this->chevalDeFrise, $this->portcullis);
		if($this->rank1 == $this->lowBar) {
			$this->lowBar = 99;
			return $this->OPRReport->low_bar_precentile($this->team);
		} elseif($this->rank1 == $this->roughTerrain){
			$this->roughTerrain = 99;
			return $this->OPRReport->rough_terrain_precentile($this->team);
		} elseif($this->rank1 == $this->rockwall){
			$this->rockwall = 99;
			return $this->OPRReport->rockwall_precentile($this->team);
		} elseif($this->rank1 == $this->sallyPort){
			$this->sallyPort = 99;
			return $this->OPRReport->sally_port_precentile($this->team);
		} elseif($this->rank1 == $this->drawbridge){
			$this->drawbridge = 99;
			return $this->OPRReport->drawbridge_precentile($this->team);
		} elseif($this->rank1 == $this->ramparts){
			$this->ramparts = 99;
			return $this->OPRReport->ramparts_precentile($this->team);
		} elseif($this->rank1 == $this->moat){
			$this->moat = 99;
			return $this->OPRReport->moat_precentile($this->team);
		} elseif($this->rank1 == $this->chevalDeFrise){
			$this->chevalDeFrise = 99;
			return $this->OPRReport->cheval_de_frise_precentile($this->team);
		} else{
			$this->portcullis = 99;
			return $this->OPRReport->portcullis_precentile($this->team);
		}
	}

	public function display_second_rank(){
		$this->rank2 = min($this->lowBar, $this->roughTerrain, $this->rockwall, $this->sallyPort, $this->drawbridge, $this->ramparts, $this->moat, $this->chevalDeFrise, $this->portcullis);
		if($this->rank2 == $this->lowBar) {
			$this->lowBar = 99;
			return $this->OPRReport->low_bar_precentile($this->team);
		} elseif($this->rank2 == $this->roughTerrain){
			$this->roughTerrain = 99;
			return $this->OPRReport->rough_terrain_precentile($this->team);
		} elseif($this->rank2 == $this->rockwall){
			$this->rockwall = 99;
			return $this->OPRReport->rockwall_precentile($this->team);
		} elseif($this->rank2 == $this->sallyPort){
			$this->sallyPort = 99;
			return $this->OPRReport->sally_port_precentile($this->team);
		} elseif($this->rank2 == $this->drawbridge){
			$this->drawbridge = 99;
			return $this->OPRReport->drawbridge_precentile($this->team);
		} elseif($this->rank2 == $this->ramparts){
			$this->ramparts = 99;
			return $this->OPRReport->ramparts_precentile($this->team);
		} elseif($this->rank2 == $this->moat){
			$this->moat = 99;
			return $this->OPRReport->moat_precentile($this->team);
		} elseif($this->rank2 == $this->chevalDeFrise){
			$this->chevalDeFrise = 99;
			return $this->OPRReport->cheval_de_frise_precentile($this->team);
		} else{
			$this->portcullis = 99;
			return $this->OPRReport->portcullis_precentile($this->team);
		}
	}

	public function display_third_rank(){
		$this->rank3 = min($this->lowBar, $this->roughTerrain, $this->rockwall, $this->sallyPort, $this->drawbridge, $this->ramparts, $this->moat, $this->chevalDeFrise, $this->portcullis);
		if($this->rank3 == $this->lowBar) {
			$this->lowBar = 99;
			return $this->OPRReport->low_bar_precentile($this->team);
		} elseif($this->rank3 == $this->roughTerrain){
			$this->roughTerrain = 99;
			return $this->OPRReport->rough_terrain_precentile($this->team);
		} elseif($this->rank3 == $this->rockwall){
			$this->rockwall = 99;
			return $this->OPRReport->rockwall_precentile($this->team);
		} elseif($this->rank3 == $this->sallyPort){
			$this->sallyPort = 99;
			return $this->OPRReport->sally_port_precentile($this->team);
		} elseif($this->rank3 == $this->drawbridge){
			$this->drawbridge = 99;
			return $this->OPRReport->drawbridge_precentile($this->team);
		} elseif($this->rank3 == $this->ramparts){
			$this->ramparts = 99;
			return $this->OPRReport->ramparts_precentile($this->team);
		} elseif($this->rank3 == $this->moat){
			$this->moat = 99;
			return $this->OPRReport->moat_precentile($this->team);
		} elseif($this->rank3 == $this->chevalDeFrise){
			$this->chevalDeFrise = 99;
			return $this->OPRReport->cheval_de_frise_precentile($this->team);
		} else{
			$this->portcullis = 99;
			return $this->OPRReport->portcullis_precentile($this->team);
		}
	}

	public function display_shooter_rank(){
		if($this->OPRReport->high_goal_rank($this->team) < $this->OPRReport->low_goal_rank($this->team))
			return "HG shooter " . "{$this->OPRReport->high_goal_precentile($this->team)}";
		else
			return "LG scorer " . "{$this->OPRReport->low_goal_precentile($this->team)}";
	}

	public function display_scaler_rank(){
		return "{$this->OPRReport->scale_precentile($this->team)}";
	}

	public function display_auto_rank(){
		return $this->autopts;
	}

	public function overall_rank(){
		return "{$this->OPRReport->sum_precentile($this->team)}";
	}

}



?>