<?php

  $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "bms";

   $connection = mysqli_connect($servername, $username, $password, $dbname);

   if(!$connection){
   	die ("QUERY FAILED" . mysqli_connect_error($connection));
   }

?>