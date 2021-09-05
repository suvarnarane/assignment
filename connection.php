<?php
$server = "localhost";
$username = "root" ;
$password ="";
$dbname = "animal_info";
 

$con = mysqli_connect($server,$username,$password,$dbname);

if($con)
{
echo "connection ok";
}
else
{
die("Connection failed".mysqli_connect_error());
}
?>

