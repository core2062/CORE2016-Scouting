<?php

//if(isset($_POST['Submit'])){

    echo 'Detect Submit';

    $alliance = trim($_POST['AllianceColor']);
    $matchNum = trim($_POST['MatchNumber']);
    $team = trim($_POST['TeamNumber']);
    $scout = trim($_POST['ScoutName']);

    $autoDefence = trim($_POST['DefenseInteractionType']); // Reached, Breached, No Interaction

    if(empty($_POST['DefenseInteractionAuto'])){ //CategoryA-D Low Bar
        $breachDefence = 'N/A'; // Also the name for if alliance interacts with defence in auto, which defence?
    } elseif(trim($_POST['DefenseInteractionAuto']) == 'Low Bar'){
        $breachDefence = trim($_POST['DefenseInteractionAuto']);
    } else {
        $breachDefence = 'Other';
    }
    //$autoShoot = trim($_POST['autoShoot']);
    $highGoalAutoShotsMade = trim($_POST['HighGoalAuto']);
    $highGoalAutoMisses = trim($_POST['HighGoalAutoMisses']);
    $lowGoalAutoShotsMade = trim($_POST['LowGoalAuto']);
    $lowGoalAutoMisses = trim($_POST['LowGoalAutoMisses']);



    $categoryA = trim($_POST['CategoryA']); // Portcullis Cheval de Frise
    $categoryAScore = trim($_POST['CategoryACrosses']);
    $categoryB = trim($_POST['CategoryB']); // Ramparts Moat
    $categoryBScore = trim($_POST['CategoryBCrosses']);
    $categoryC = trim($_POST['CategoryC']); // Drawbridge Sally Port
    $categoryCScore = trim($_POST['CategoryCCrosses']);
    $categoryD = trim($_POST['CategoryD']); //Rock Wall Rough Terrain
    $categoryDScore = trim($_POST['CategoryDCrosses']);
    $lowBarScore = trim($_POST['LowBarCrosses']);

    $lowGoalShots = trim($_POST['LowGoalTeleop']);
    $missedLowGoalShots = trim($_POST['LowGoalTeleopMisses']);
    $highGoalShots = trim($_POST['HighGoalTeleop']);
    $missedHighGoalShots = trim($_POST['HighGoalTeleopMisses']);

    $challengeTower = trim($_POST['ChallengedTower']); //Yes No
    $scaleTower = trim($_POST['ScaledTower']); // Yes No
    if(isset($_POST['fouls'])){
        $fouls = trim($_POST['fouls']); //Not implimented
    } else {
        $fouls = 'N/A';
    }
    if(isset($_POST['techFouls'])){
        $techFouls = trim($_POST['techFouls']); // Not implimented
    } else {
        $techFouls = 'N/A';
    }
    if(isset($_POST['redCard'])){
        $redCard = trim($_POST['redCard']); // Not implimented
    } else {
        $redCard = 'N/A';
    }
    if(isset($_POST['yellowCard'])){
        $yellowCard = trim($_POST['yellowCard']); // Not implimented
    } else {
        $yellowCard = 'N/A';
    }
    if(empty($_POST['comments']) || !(isset($_POST['comments']))){ // Not implimented
        $comments = 'N/A';
    } else {
        $comments = trim($_POST['comments']);
    }

    $connect = require_once('sqli_connect.php');

    if($connect == false){
        echo 'Could not connect to mysqli';
    } else {
        echo 'Connected to mysqli';
    
        $sql = "INSERT INTO `match` 
            (`match_id`, `alliance`, `matchNum`, `team`, 
            `scout`, `autoDefence`, `breachDefence`, `highGoalAutoShotsMade`, 
            `highGoalAutoMisses`, `lowGoalAutoShotsMade`, `lowGoalAutoMisses`, 
            `categoryA`, `categoryAScore`, `categoryB`, `categoryBScore`, `categoryC`, 
            `categoryCScore`, `categoryD`, `categoryDScore`, `lowBarScore`, `lowGoalShots`, 
            `missedLowGoalShots`, `highGoalShots`, `missedHighGoalShots`, `challengeTower`, 
            `scaleTower`) 
        VALUES 
            (NULL, '$alliance', $matchNum, $team, '$scout', '$autoDefence', 
            '$breachDefence', $highGoalAutoShotsMade,$highGoalAutoMisses, 
            $lowGoalAutoShotsMade, $lowGoalAutoMisses, '$categoryA', $categoryAScore, 
            '$categoryB', $categoryBScore, '$categoryC', $categoryCScore, '$categoryD', 
            $categoryDScore, $lowBarScore, $lowGoalShots, $missedLowGoalShots, $highGoalShots, 
            $missedHighGoalShots, '$challengeTower', '$scaleTower');";

// , `fouls`, `techFouls`, `redCard`, `yellowCard`, `comments` TO BE ADDED
//, $fouls, $techFouls, '$redCard', '$yellowCard', '$comments' TO BE ADDED

        mysql_query($sql)
          or die(mysql_error());
    }


//}

mysqli_close($dbc);

//ini_set('display_errors', 1);
//error_reporting(E_ALL | E_STRICT);
?>
<p><a href="MainForm.html">Click here to submit another Responce!</a></p>