<?php

// Connect to the database
mysql_connect('localhost', 'root', 'password')
  or die("<p><strong>Database connection error".mysql_error()."</strong></p>");

mysql_select_db('ScoutagyDev')
  or die("<p><strong>Problem finding the database<br>".mysql_error()."</strong></p>");



?>