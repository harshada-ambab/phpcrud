<?php
include 'connection.php';

$id = $_GET['id'];
$qry = "delete from crud where Id = $id";
$data = mysqli_query($conn,$qry);
if($data){
    header('location:index.php');
    alert("Data Deleted Successfully");
}
else{
    alert("Data Not Deleted");
}


?>