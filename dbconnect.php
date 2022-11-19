<?php
$severName ="localHost";
$userName="root";
$password= "";
$dbname="dblaptop";
//create connection
$conn = mysqli_connect($severName,$userName,$password,$dbname);
// check connection
if(!$conn){
    die("connection failed:".mysqli_connect_error());

}
?>


