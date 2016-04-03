<?php
$connect = require_once('../SQL_connect.php');

$alliance = mysql_real_escape_string(trim($_POST['AllianceColor']));
$matchNum = mysql_real_escape_string(trim($_POST['MatchNumber']));
$team = mysql_real_escape_string(trim($_POST['TeamNumber']));
$scout = mysql_real_escape_string(trim($_POST['ScoutName']));
$autoDefence = mysql_real_escape_string(trim($_POST['DefenseInteractionType'])); // Reached, Breached, No Interaction
if($autoDefence == 'Breached'){
    $breachDefence = mysql_real_escape_string(trim($_POST['DefenseInteractionAuto']));
} else {
    $breachDefence = 'N/A';
}
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
if(isset($_POST['ChallengedTower'])){
    $challengeTower = 'Yes';
} else {
    $challengeTower = 'No';
}
if(isset($_POST['ScaledTower'])){
    $scaleTower = 'Yes';
    $challengeTower = 'No';
} else {
    $scaleTower = 'No';
}
if(isset($_POST['fouls'])){
    $fouls = mysql_real_escape_string(trim($_POST['fouls'])); 
} else {
    $fouls = 'ERROR';
}
if(isset($_POST['techFouls'])){
    $techFouls = mysql_real_escape_string(trim($_POST['techFouls'])); 
} else {
    $techFouls = 'ERROR';
}
if(isset($_POST['redCard'])){
    $redCard = mysql_real_escape_string(trim($_POST['redCard'])); 
} else {
    $redCard = 'N/A';
}
if(isset($_POST['yellowCard'])){
    $yellowCard = mysql_real_escape_string(trim($_POST['yellowCard']));
} else {
    $yellowCard = 'N/A';
}
if(empty($_POST['comments']) || !(isset($_POST['comments']))){ 
    $comments = 'N/A';
} else {
    $comments = mysql_real_escape_string(trim($_POST['comments']));
}
if(empty($_POST['disabled']) || !(isset($_POST['disabled']))){ 
    $disabled = 'No';
} else {
    $disabled = 'Yes';
}
if(empty($alliance))
    echo '<font size="5"><b> ALLIANCE COLOR NOT ENTERED! </b></font>';
if(empty($matchNum))
    echo '<font size="5"><b> MATCH NUMBER NOT ENTERED! </b></font>';
if(empty($team))
    echo '<font size="5"><b> TEAM NUMBER NOT ENTERED! </b></font>';
if(empty($scout))
    echo '<font size="5"><b> SCOUT NAME NOT ENTERED! </b></font>';
if(empty($autoDefence) || empty($breachDefence))
    echo '<font size="5"><b> AUTO DEFENCE INFORMATION NOT CORRECTLY SELECTED! </b></font>';
if(empty($categoryA) || empty($categoryB) || empty($categoryC) || empty($categoryD))
    echo '<font size="5"><b> MAKE SURE A DEFENCE WAS SELECTED FOR EVERY CATEGORY EVEN IF IT IS NOT ON THE FIELD! </b></font>';
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
    mysql_query($sql)
      or die(mysql_error());
} else {
    echo 'ERROR: COULD NOT CONNECT TO SQL!';
}
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