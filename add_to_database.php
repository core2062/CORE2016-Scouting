<?php

if(isset($_POST['submit'])){


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



    $categoryA = trim($_POST['categoryA']); // Portcullis Cheval de Frise
    $categoryAScore = trim($_POST['categoryACrosses']);
    $categoryB = trim($_POST['categoryB']); // Ramparts Moat
    $categoryBScore = trim($_POST['categoryBCrosses']);
    $categoryC = trim($_POST['categoryC']); // Drawbridge Sally Port
    $categoryCScore = trim($_POST['categoryCCrosses']);
    $categoryD = trim($_POST['categoryD']); //Rock Wall Rough Terrain
    $categoryDScore = trim($_POST['categoryDCrosses']);
    $lowBarScore = trim($_POST['lowBarCrosses']);

    $lowGoalShots = trim($_POST['LowGoalTeleop']);
    $missedLowGoalShots = trim($_POST['LowGoalTeleopMisses']);
    $highGoalShots = trim($_POST['HighGoalTeleop']);
    $missedHighGoalShots = trim($_POST['HighGoalTeleopMisses']);

    $challengeTower = trim($_POST['ChallengedTower']); //Yes No
    $scaleTower = trim($_POST['ScaledTower']); // Yes No
    $fouls = trim($_POST['fouls']); //Not implimented
    $techFouls = trim($_POST['techFouls']); // Not implimented
    $redCard = trim($_POST['redCard']); // Not implimented
    $yellowCard = trim($_POST['yellowCard']); // Not implimented

    if(empty($_POST['comments'])){ // Not implimented
        $comments = 'N/A';
    } else {
        $comments = trim($_POST['comments']);
    }

    
    require_once('mysqli_connect.php');
    
    $query = "INSERT INTO match (match_id, alliance, matchNum, team, scout, autoDefence, 
    breachDefence, highGoalAutoShotsMade, highGoalAutoMisses, lowGoalAutoShotsMade, 
    lowGoalAutoMisses, categoryA, categoryAScore, categoryB, categoryBScore, 
    categoryC, categoryCScore, categoryD, categoryDScore, lowBarScore, lowGoalShots, 
    missedLowGoalShots, highGoalShots, missedHighGoalShots, challengeTower, scaleTower, 
    fouls, techFouls, redCard, yellowCard, comments) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 
    ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($dbc, $query);
    
    mysqli_stmt_bind_param($stmt, "isiisssiiiisisisisiiiiiissiisss", $alliance, $matchNum, 
        $team, $scout, $autoDefence, $breachDefence, $highGoalAutoShotsMade, 
        $highGoalAutoMisses, $lowGoalAutoShotsMade, $lowGoalAutoMisses, $categoryA, 
        $categoryAScore, $categoryB, $categoryBScore, $categoryC, $categoryCScore, 
        $categoryD, $categoryDScore, $lowBarScore, $lowGoalShots, $missedLowGoalShots, 
        $highGoalShots, $missedHighGoalShots, $challengeTower, $scaleTower, $fouls, 
        $techFouls, $redCard, $yellowCard, $comments);

    mysqli_stmt_execute($stmt);
    
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    
    if($affected_rows == 1){
        
        echo 'Match Sucessfully Submited!';
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($dbc);
        
    } else {
        
        echo 'Error Occurred<br>';
        echo mysqli_error();
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($dbc);
        
    }

}
ini_set('display_errors', 1);
error_reporting(E_ALL | E_STRICT);
?>
<p><a href="MainForm.php">Click here to submit another message!</a></p>