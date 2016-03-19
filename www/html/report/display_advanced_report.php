<?php
include 'get_from_database.php';
include "OPR.php"

$objArray = array();
$teamNumberArray = array();

require_once('/var/www/sqli_connect.php');
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
//echo "{$OPRReport->sum_precentile(2020)}";


function report($team){
	$rank1 = 0;
	$rank2 = 0;
	$rank3 = 0;
	$rank1Name;
	$rank2Name;
	$rank3Name;
	$goalName;
	$scale;
	$lowBar = $OPRReport->low_bar_rank($team);
	$roughTerrain = $OPRReport->rough_terrain_rank($team);
	$rockwall = $OPRReport->rockwall_rank($team);
	$sallyPort = $OPRReport->sally_port_rank($team);
	$drawbridge = $OPRReport->drawbridge_rank($team);
	$ramparts = $OPRReport->ramparts_rank($team);
	$moat = $OPRReport->moat_rank($team);
	$chevalDeFrise = $OPRReport->cheval_de_frise_rank($team);
	$portcullis = $OPRReport->portcullis_rank($team);
	$rank1 = max($lowBar, $roughTerrain, $rockwall, $sallyPort, $drawbridge, $ramparts, $moat, $chevalDeFrise, $portcullis);
	if($rank1 == $lowBar) {
		$lowBar = 0;
		$rank1Name = $OPRReport->low_bar_precentile;
	} elseif($rank1 == $roughTerrain){
		$roughTerrain = 0;
		$rank1Name = $OPRReport->rough_terrain_precentile($team);
	} elseif($rank1 == $rockwall){
		$rockwall = 0;
		$rank1Name = $OPRReport->rockwall_precentile($team);
	} elseif($rank1 == $sallyPort){
		$sallyPort = 0;
		$rank1Name = $OPRReport->sally_port_precentile($team);
	} elseif($rank1 == $drawbridge){
		$drawbridge = 0;
		$rank1Name = $OPRReport->drawbridge_precentile($team);
	} elseif($rank1 == $ramparts){
		$ramparts = 0;
		$rank1Name = $OPRReport->ramparts_precentile($team);
	} elseif($rank1 == $moat){
		$moat = 0;
		$rank1Name = $OPRReport->moat_precentile($team);
	} elseif($rank1 == $chevalDeFrise){
		$chevalDeFrise = 0;
		$rank1Name = $OPRReport->cheval_de_frise_precentile($team);
	} else($rank1 == $portcullis){
		$portcullis = 0;
		$rank1Name = $OPRReport->portcullis_precentile($team);
	} 
	$rank2 = max($lowBar, $roughTerrain, $rockwall, $sallyPort, $drawbridge, $ramparts, $moat, $chevalDeFrise, $portcullis);
	if($rank2 == $lowBar) {
		$lowBar = 0;
		$rank2Name = $OPRReport->low_bar_precentile;
	} elseif($rank2 == $roughTerrain){
		$roughTerrain = 0;
		$rank2Name = $OPRReport->rough_terrain_precentile($team);
	} elseif($rank2 == $rockwall){
		$rockwall = 0;
		$rank2Name = $OPRReport->rockwall_precentile($team);
	} elseif($rank2 == $sallyPort){
		$sallyPort = 0;
		$rank2Name = $OPRReport->sally_port_precentile($team);
	} elseif($rank2 == $drawbridge){
		$drawbridge = 0;
		$rank2Name = $OPRReport->drawbridge_precentile($team);
	} elseif($rank2 == $ramparts){
		$ramparts = 0;
		$rank2Name = $OPRReport->ramparts_precentile($team);
	} elseif($rank2 == $moat){
		$moat = 0;
		$rank2Name = $OPRReport->moat_precentile($team);
	} elseif($rank2 == $chevalDeFrise){
		$chevalDeFrise = 0;
		$rank2Name = $OPRReport->cheval_de_frise_precentile($team);
	} else($rank2 == $portcullis){
		$portcullis = 0;
		$rank2Name = $OPRReport->portcullis_precentile($team);
	} 
	$rank3 = max($lowBar, $roughTerrain, $rockwall, $sallyPort, $drawbridge, $ramparts, $moat, $chevalDeFrise, $portcullis);
	if($rank3 == $lowBar) {
		$lowBar = 0;
		$rank3Name = $OPRReport->low_bar_precentile;
	} elseif($rank3 == $roughTerrain){
		$roughTerrain = 0;
		$rank3Name = $OPRReport->rough_terrain_precentile($team);
	} elseif($rank3 == $rockwall){
		$rockwall = 0;
		$rank3Name = $OPRReport->rockwall_precentile($team);
	} elseif($rank3 == $sallyPort){
		$sallyPort = 0;
		$rank3Name = $OPRReport->sally_port_precentile($team);
	} elseif($rank3 == $drawbridge){
		$drawbridge = 0;
		$rank3Name = $OPRReport->drawbridge_precentile($team);
	} elseif($rank3 == $ramparts){
		$ramparts = 0;
		$rank3Name = $OPRReport->ramparts_precentile($team);
	} elseif($rank3 == $moat){
		$moat = 0;
		$rank3Name = $OPRReport->moat_precentile($team);
	} elseif($rank3 == $chevalDeFrise){
		$chevalDeFrise = 0;
		$rank3Name = $OPRReport->cheval_de_frise_precentile($team);
	} else($rank3 == $portcullis){
		$portcullis = 0;
		$rank3Name = $OPRReport->portcullis_precentile($team);
	}

	if($OPRReport->high_goal_rank($team) > $OPRReport->low_goal_rank($team))
		$goalName = $OPRReport->high_goal_precentile($team);
	else
		$goalName = $OPRReport->low_goal_precentile($team);
	if($OPRReport->scale_rank($team) > ($OPRReport->number_of_teams() / 2))
		$scale = $OPRReport->scale_precentile($team);
	else
		$scale = " ";
	
	$dis = ""
}

?>