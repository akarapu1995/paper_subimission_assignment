<?php
   
 // Enter your host name, database username, password, and database name.
 
   // If you have not set database password on localhost then set empty.



$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$con = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);







  //  $con = mysqli_connect("localhost","root","","conference_review");
   
 // Check connection
 
   if (mysqli_connect_errno()){
     
   	echo "Failed to connect to MySQL: " . mysqli_connect_error();

 
 }

?>
