<html>
<head>
<title>Add Student</title>
</head>
<body>
<?php

if(isset($_POST['submit'])){

    // 
    $alliance = trim($_POST['alliance']);
    $match = trim($_POST['match']);
    $team = trim($_POST['team']);
    $scout = trim($_POST['scout'])
    $autoDefence = trim($_POST['autoDefence']);
    if(empty($_POST['breachDefence'])){
        $breachDefence = 'none';
    } else {
        $breachDefence = trim(($_POST['breachDefence']);
    }
    $autoShoot = trim($_POST['autoShoot']);
    $categoryA = trim($_POST['categoryA']);
    $categoryAScore = trim($_POST['categoryAScore']);
    $categoryB = trim($_POST['categoryB']);
    $categoryBScore = trim($_POST['categoryBScore']);
    $categoryC = trim($_POST['categoryC']);
    $categoryCScore = trim($_POST['categoryCScore']);
    $categoryD = trim($_POST['categoryD']);
    $categoryDScore = trim($_POST['categoryDScore']);
    $lowBarScore = trim($_POST['lowBarScore']);
    $lowGoalShots = trim($_POST['lowGoalShots']);
    $missedLowGoalShots = trim($_POST['missedLowGoalShots']);
    $highGoalShots = trim($_POST['highGoalShots']);
    $missedHighGoalShots = trim($_POST['missedHighGoalShots']);
    $challengeTower = trim($_POST['challengeTower']);
    $scaleTower = trim($_POST['scaleTower']);
    $fouls = trim($_POST['fouls']);
    $techFouls = trim($_POST['techFouls']);
    $redCard = trim($_POST['redCard']);
    $yellowCard = trim($_POST['yellowCard']);

    if(empty($_POST['comments'])){
        $comments = 'none';
    } else {
        $comments = trim($_POST['comments']);
    }

    
    require_once('mysqli_connect.php');
    
    $query = "INSERT INTO match (match_id, alliance, match, team, scout, autoDefence, breachDefence, autoShoot, categoryA, categoryAScore, categoryB, categoryBScore, categoryC, categoryCScore, categoryD, categoryDScore, lowBarScore, lowGoalShots, missedLowGoalShots, highGoalShots, missedHighGoalShots, challengeTower, scaleTower, fouls, techFouls, redCard, yellowCard, comments) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($dbc, $query);
    
    mysqli_stmt_bind_param($stmt, "dsiisssssisisisiiiiiissiisss", $alliance, $match, $team, $scout, $autoDefence, $breachDefence, $autoShoot, $categoryA, $categoryAScore, $categoryB, $categoryBScore, $categoryC, $categoryCScore, $categoryD, $categoryDScore, $lowBarScore, $lowGoalShots, $missedLowGoalShots, $highGoalShots, $missedHighGoalShots, $challengeTower, $scaleTower, $fouls, $techFouls, $redCard, $yellowCard, $comments);
    
    mysqli_stmt_execute($stmt);
    
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    
    if($affected_rows == 1){
        
        echo '';
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($dbc);
        
    } else {
        
        echo 'Error Occurred<br />';
        echo mysqli_error();
        
        mysqli_stmt_close($stmt);
        
        mysqli_close($dbc);
        
    }
    
}

?>

</body>
</html>