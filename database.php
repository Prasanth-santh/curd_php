<?php

$hostname="localhost";
$dbuser="root";
$dbpassword="";
$dbname="curd";
$conn=mysqli_connect($hostname,$dbuser,$dbpassword,$dbname);
if(!$conn){
    die("someting went wrong");
}
?>