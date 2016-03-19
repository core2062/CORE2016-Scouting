<?php
$dbc = @mysqli_connect('localhost', 'root', 'password', 'ScoutagyDev')
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

//echo "<strong>Connected to MySQLi</strong>";
?>