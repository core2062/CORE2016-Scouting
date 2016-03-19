<?php
// Opens a connection to the database
// Since it is a php file it won't open in a browser 
// It should be saved outside of the main web documents folder
// and imported when needed

/*
Command that gives the database user the least amount of power
as is needed.
GRANT INSERT, SELECT, DELETE, UPDATE ON test3.* 
TO 'studentweb'@'localhost' 
IDENTIFIED BY 'turtledove';
SELECT : Select rows in tables
INSERT : Insert new rows into tables
UPDATE : Change data in rows
DELETE : Delete existing rows (Remove privilege if not required)
*/

// Defined as constants so that they can't be changed
//DEFINE ('DB_USER', 'root');
//DEFINE ('DB_PASSWORD', '8J5kOXBLlC');
//DEFINE ('DB_HOST', 'localhost');
//DEFINE ('DB_NAME', 'ScoutagyDev');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser


// Connect to the database
mysql_connect('localhost', 'root', 'PASSWORD')
  or die("<p><strong>Database connection error".mysql_error()."</strong></p>");

//echo "<strong>Connected to MySQL</strong>";

mysql_select_db('ScoutagyDev')
  or die("<p><strong>Problem finding the database<br>".mysql_error()."</strong></p>");

//echo "
//<br><strong>Connected to the database</strong>
//";

?>