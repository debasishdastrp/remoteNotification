<?php
$db_server="localhost";
$db_name="termux_api_notification";
$db_username="root";
$db_password="";



//Do not edit below ==================================================
$conn=mysqli_connect($db_server,$db_username,$db_password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$db= mysqli_select_db($conn, $db_name);
if(!$db)
{
   $sql = "create database $db_name";
   if($conn->query($sql)=== TRUE)
   {
       echo "New Database Crerated";
       mysqli_select_db($conn, $db_name);
   }
   else{
       echo $sql;
       echo "Error occoured while creating new database". mysqli_error($conn);
   }
}

?>