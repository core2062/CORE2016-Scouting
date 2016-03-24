<?php

//if(isset($_POST['Submit'])){
    $connect = require_once('../SQL_connect.php');

    $alliance = mysql_real_escape_string(trim($_POST['AllianceColor']));
    $matchNum = mysql_real_escape_string(trim($_POST['MatchNumber']));
    $team = mysql_real_escape_string(trim($_POST['TeamNumber']));
    $scout = mysql_real_escape_string(trim($_POST['ScoutName']));

    $autoDefence = mysql_real_escape_string(trim($_POST['DefenseInteractionType'])); // Reached, Breached, No Interaction

    $breachDefence = mysql_real_escape_string(trim($_POST['DefenseInteractionAuto']));
   /* if($_POST['DefenseInteractionAuto'] == 'N/A'){ //CategoryA-D Low Bar
        $breachDefence = 'N/A'; // Also the name for if alliance interacts with defence in auto, which defence?
    } elseif(trim($_POST['DefenseInteractionAuto']) == 'Low Bar'){
        $breachDefence = mysql_real_escape_string(trim($_POST['DefenseInteractionAuto']));
    } else {
        $breachDefence = 'Other';
    } */
    //$autoShoot = trim($_POST['autoShoot']);
    $highGoalAutoShotsMade = mysql_real_escape_string(trim($_POST['HighGoalAuto']));
    $highGoalAutoMisses = mysql_real_escape_string(trim($_POST['HighGoalAutoMisses']));
    $lowGoalAutoShotsMade = mysql_real_escape_string(trim($_POST['LowGoalAuto']));
    $lowGoalAutoMisses = mysql_real_escape_string(trim($_POST['LowGoalAutoMisses']));



    $categoryA = mysql_real_escape_string(trim($_POST['CategoryA'])); // Portcullis Cheval de Frise
    $categoryAScore = mysql_real_escape_string(trim($_POST['CategoryACrosses']));
    $categoryB = mysql_real_escape_string(trim($_POST['CategoryB'])); // Ramparts Moat
    $categoryBScore = mysql_real_escape_string(trim($_POST['CategoryBCrosses']));
    $categoryC = mysql_real_escape_string(trim($_POST['CategoryC'])); // Drawbridge Sally Port
    $categoryCScore = mysql_real_escape_string(trim($_POST['CategoryCCrosses']));
    $categoryD = mysql_real_escape_string(trim($_POST['CategoryD'])); //Rock Wall Rough Terrain
    $categoryDScore = mysql_real_escape_string(trim($_POST['CategoryDCrosses']));
    $lowBarScore = mysql_real_escape_string(trim($_POST['LowBarCrosses']));

    $lowGoalShots = mysql_real_escape_string(trim($_POST['LowGoalTeleop']));
    $missedLowGoalShots = mysql_real_escape_string(trim($_POST['LowGoalTeleopMisses']));
    $highGoalShots = mysql_real_escape_string(trim($_POST['HighGoalTeleop']));
    $missedHighGoalShots = mysql_real_escape_string(trim($_POST['HighGoalTeleopMisses']));

    $challengeTower = mysql_real_escape_string(trim($_POST['ChallengedTower'])); //Yes No
    $scaleTower = mysql_real_escape_string(trim($_POST['ScaledTower'])); // Yes No
    if(isset($_POST['fouls'])){
        $fouls = mysql_real_escape_string(trim($_POST['fouls'])); //Not implimented
    } else {
        $fouls = 'N/A';
    }
    if(isset($_POST['techFouls'])){
        $techFouls = mysql_real_escape_string(trim($_POST['techFouls'])); // Not implimented
    } else {
        $techFouls = 'N/A';
    }
    if(isset($_POST['redCard'])){
        $redCard = mysql_real_escape_string(trim($_POST['redCard'])); // Not implimented
    } else {
        $redCard = 'N/A';
    }
    if(isset($_POST['yellowCard'])){
        $yellowCard = mysql_real_escape_string(trim($_POST['yellowCard'])); // Not implimented
    } else {
        $yellowCard = 'N/A';
    }
    if(empty($_POST['comments']) || !(isset($_POST['comments']))){ // Not implimented
        $comments = 'N/A';
    } else {
        $comments = mysql_real_escape_string(trim($_POST['comments']));
    }
    if(empty($_POST['disabled']) || !(isset($_POST['disabled']))){ // Not implimented
        $disabled = 'No';
    } else {
        $disabled = 'Yes';
    }

    if($connect == true){
        $sql = "INSERT INTO `match` 
            (`match_id`, `alliance`, `matchNum`, `team`, 
            `scout`, `autoDefence`, `breachDefence`, `highGoalAutoShotsMade`, 
            `highGoalAutoMisses`, `lowGoalAutoShotsMade`, `lowGoalAutoMisses`, 
            `categoryA`, `categoryAScore`, `categoryB`, `categoryBScore`, `categoryC`, 
            `categoryCScore`, `categoryD`, `categoryDScore`, `lowBarScore`, `lowGoalShots`, 
            `missedLowGoalShots`, `highGoalShots`, `missedHighGoalShots`, `challengeTower`, 
            `scaleTower`, `fouls`, `techFouls`, `redCard`, `yellowCard`, `comments`, `disabled`) 
        VALUES 
            (NULL, '$alliance', $matchNum, $team, '$scout', '$autoDefence', 
            '$breachDefence', $highGoalAutoShotsMade,$highGoalAutoMisses, 
            $lowGoalAutoShotsMade, $lowGoalAutoMisses, '$categoryA', $categoryAScore, 
            '$categoryB', $categoryBScore, '$categoryC', $categoryCScore, '$categoryD', 
            $categoryDScore, $lowBarScore, $lowGoalShots, $missedLowGoalShots, $highGoalShots, 
            $missedHighGoalShots, '$challengeTower', '$scaleTower', $fouls, $techFouls, 
            '$redCard', '$yellowCard', '$comments', '$disabled');";

//  TO BE ADDED
// TO BE ADDED

        mysql_query($sql)
          or die(mysql_error());
    } else {
        echo 'ERROR: COULD NOT CONNECT TO SQL!';
    }


//}

//mysql_close($dbc);

//ini_set('display_errors', 1);
//error_reporting(E_ALL | E_STRICT);
echo "<br>
The Form You Submited contained: <br>
Match Number: {$matchNum} <br>
Team: {$team} <br>
Alliance: {$alliance} <br>
Scout: {$scout} <br>
Auto Defence Interaction Type: {$autoDefence} <br>
Team Breached In Auto Via: {$breachDefence} <br>
High Goal Auto Shots: {$highGoalAutoShotsMade} / {$highGoalAutoMisses} <br>
Low Goal Auto Shots: {$lowGoalAutoShotsMade} / {$lowGoalAutoMisses} <br>
Tele High Goal Shots: {$highGoalShots} / {$missedHighGoalShots} <br>
Tele Low Goal Shots: {$lowGoalShots} / {$missedLowGoalShots} <br>
Category A Defence & Crosses: {$categoryA} = {$categoryAScore} <br>
Category B Defence & Crosses: {$categoryB} = {$categoryBScore} <br>
Category C Defence & Crosses: {$categoryC} = {$categoryCScore} <br>
Category D Defence & Crosses: {$categoryD} = {$categoryDScore} <br>
Low Bar Crosses: {$lowBarScore} <br>
ChallengeTower?: {$challengeTower} <br>
Scale Tower?: {$scaleTower} <br>
Fouls: {$fouls} : Tech: {$techFouls} <br>
Disabled?: {$disabled} <br>
";
?>
<p><a href="https://scouting.core2062.com">Click here to submit another Response!</a></p>   