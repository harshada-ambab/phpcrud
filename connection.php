<?php
$serverName = "localhost";
$userName="harshada";
$password="harshada123";
$db="testDb";


$conn =  new mysqli($serverName,$userName,$password,$db);

if ($conn->connect_error){
    die("Connection Failed" .$conn->connect_error);
}
?>