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
		} else/*($this->rank1 == $this->portcullis)*/{
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
		} else/*($this->rank2 == $this->portcullis)*/{
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
		} else/*($this->rank3 == $this->portcullis)*/{
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





















/*
function report($team, advancedReport &$OPRReport){
	$rank1 = 0;
	$rank2 = 0;
	$rank3 = 0;
	$rank1Name;
	$rank2Name;
	$rank3Name;
	$goalName;
	$scale;
	$autopts = $OPRReport->auto_precentile($team);
	$lowBar = $OPRReport->low_bar_rank($team);
	$roughTerrain = $OPRReport->rough_terrain_rank($team);
	$rockwall = $OPRReport->rockwall_rank($team);
	$sallyPort = $OPRReport->sally_port_rank($team);
	$drawbridge = $OPRReport->drawbridge_rank($team);
	$ramparts = $OPRReport->ramparts_rank($team);
	$moat = $OPRReport->moat_rank($team);
	$chevalDeFrise = $OPRReport->cheval_de_frise_rank($team);
	$portcullis = $OPRReport->portcullis_rank($team);
	$rank1 = min($lowBar, $roughTerrain, $rockwall, $sallyPort, $drawbridge, $ramparts, $moat, $chevalDeFrise, $portcullis);
	if($rank1 == $lowBar) {
		$lowBar = 99;
		$rank1Name = $OPRReport->low_bar_precentile($team);
	} elseif($rank1 == $roughTerrain){
		$roughTerrain = 99;
		$rank1Name = $OPRReport->rough_terrain_precentile($team);
	} elseif($rank1 == $rockwall){
		$rockwall = 99;
		$rank1Name = $OPRReport->rockwall_precentile($team);
	} elseif($rank1 == $sallyPort){
		$sallyPort = 99;
		$rank1Name = $OPRReport->sally_port_precentile($team);
	} elseif($rank1 == $drawbridge){
		$drawbridge = 99;
		$rank1Name = $OPRReport->drawbridge_precentile($team);
	} elseif($rank1 == $ramparts){
		$ramparts = 99;
		$rank1Name = $OPRReport->ramparts_precentile($team);
	} elseif($rank1 == $moat){
		$moat = 99;
		$rank1Name = $OPRReport->moat_precentile($team);
	} elseif($rank1 == $chevalDeFrise){
		$chevalDeFrise = 99;
		$rank1Name = $OPRReport->cheval_de_frise_precentile($team);
	} else{
		$portcullis = 99;
		$rank1Name = $OPRReport->portcullis_precentile($team);
	} 
	$rank2 = min($lowBar, $roughTerrain, $rockwall, $sallyPort, $drawbridge, $ramparts, $moat, $chevalDeFrise, $portcullis);
	if($rank2 == $lowBar) {
		$lowBar = 99;
		$rank2Name = $OPRReport->low_bar_precentile($team);
	} elseif($rank2 == $roughTerrain){
		$roughTerrain = 99;
		$rank2Name = $OPRReport->rough_terrain_precentile($team);
	} elseif($rank2 == $rockwall){
		$rockwall = 99;
		$rank2Name = $OPRReport->rockwall_precentile($team);
	} elseif($rank2 == $sallyPort){
		$sallyPort = 99;
		$rank2Name = $OPRReport->sally_port_precentile($team);
	} elseif($rank2 == $drawbridge){
		$drawbridge = 99;
		$rank2Name = $OPRReport->drawbridge_precentile($team);
	} elseif($rank2 == $ramparts){
		$ramparts = 99;
		$rank2Name = $OPRReport->ramparts_precentile($team);
	} elseif($rank2 == $moat){
		$moat = 99;
		$rank2Name = $OPRReport->moat_precentile($team);
	} elseif($rank2 == $chevalDeFrise){
		$chevalDeFrise = 99;
		$rank2Name = $OPRReport->cheval_de_frise_precentile($team);
	} else{
		$portcullis = 99;
		$rank2Name = $OPRReport->portcullis_precentile($team);
	} 
	$rank3 = min($lowBar, $roughTerrain, $rockwall, $sallyPort, $drawbridge, $ramparts, $moat, $chevalDeFrise, $portcullis);
	if($rank3 == $lowBar) {
		$lowBar = 99;
		$rank3Name = $OPRReport->low_bar_precentile($team);
	} elseif($rank3 == $roughTerrain){
		$roughTerrain = 99;
		$rank3Name = $OPRReport->rough_terrain_precentile($team);
	} elseif($rank3 == $rockwall){
		$rockwall = 99;
		$rank3Name = $OPRReport->rockwall_precentile($team);
	} elseif($rank3 == $sallyPort){
		$sallyPort = 99;
		$rank3Name = $OPRReport->sally_port_precentile($team);
	} elseif($rank3 == $drawbridge){
		$drawbridge = 99;
		$rank3Name = $OPRReport->drawbridge_precentile($team);
	} elseif($rank3 == $ramparts){
		$ramparts = 99;
		$rank3Name = $OPRReport->ramparts_precentile($team);
	} elseif($rank3 == $moat){
		$moat = 99;
		$rank3Name = $OPRReport->moat_precentile($team);
	} elseif($rank3 == $chevalDeFrise){
		$chevalDeFrise = 99;
		$rank3Name = $OPRReport->cheval_de_frise_precentile($team);
	} else{
		$portcullis = 99;
		$rank3Name = $OPRReport->portcullis_precentile($team);
	}

	if($OPRReport->high_goal_rank($team) < $OPRReport->low_goal_rank($team))
		$goalName = "They are a high goal shooter and are " . "{$OPRReport->high_goal_precentile($team)}";
	else
		$goalName = "They are a low goal shooter and are " . "{$OPRReport->low_goal_precentile($team)}";
	if($OPRReport->scale_rank($team) < ($OPRReport->number_of_teams() / 2))
		$scale = "{$OPRReport->scale_precentile($team)}";
	else
		$scale = "not good. ";
	
	$dis = "Team {$team} is {$OPRReport->sum_precentile($team)} For their best 3 defences , 
	They are {$rank1Name} They are {$rank2Name} They are {$rank3Name} Their scaling score is {$scale} {$goalName}
	 They are {$autopts} for points scored in auto.";
	 return $dis;
}
*/

?>