<?php
//include 'get_from_database.php';
include "paragraph_report.php";
$reportType = trim($_POST['reportType']);
if($reportType == 'overall'){
	if(isset($_POST['csv']))
		$OPRReport->download_opr();
	else
		$OPRReport->rank_teams();
}elseif($reportType == 'breachRank'){
	if(isset($_POST['csv']))
		$OPRReport->download_breach();
	else
		$OPRReport->rank_by_breach();
}elseif($reportType == 'highGoalPts'){
	if(isset($_POST['csv']))
		$OPRReport->download_high_goal();
	else
		$OPRReport->rank_by_high_goal_pts();
}elseif($reportType == 'lowGoalPts'){
	if(isset($_POST['csv']))
		$OPRReport->download_low_goal();
	else
		$OPRReport->rank_by_low_goal_pts();
}elseif($reportType == 'AutoPts'){
	if(isset($_POST['csv']))
		$OPRReport->download_auto();
	else 
		$OPRReport->rank_by_auto_pts();
}elseif($reportType == 'cards'){
	
}elseif($reportType == 'scale'){
	if(isset($_POST['csv']))
		$OPRReport->download_scale();
	else
		$OPRReport->rank_by_scaling_pts();
}elseif($reportType == 'challenge'){
	if(isset($_POST['csv']))
		$OPRReport->download_challenge();
	else
		$OPRReport->rank_by_challenge();
}





?>