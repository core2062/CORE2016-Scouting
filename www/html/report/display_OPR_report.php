<?php
include 'get_from_database.php';
include "paragraph_report.php";
$reportType = trim($_POST['reportType']);
if($reportType == 'overall'){
	$OPRReport->rank_teams();
	//$OPRReport->raw_OPR();
}elseif($reportType == 'breachRank'){
	$OPRReport->rank_by_breach();
}elseif($reportType == 'highGoalPts'){
	$OPRReport->rank_by_high_goal_pts();
}elseif($reportType == 'lowGoalPts'){
	$OPRReport->rank_by_low_goal_pts();
}elseif($reportType == 'AutoPts'){
	//$OPRReport->rank_cheval_de_frise_pts();
	$OPRReport->rank_by_auto_pts();
}elseif($reportType == 'cards'){
	$OPRReport->rank_by_cards();
}elseif($reportType == 'scale'){
	$OPRReport->rank_by_scaling_pts();
}





?>