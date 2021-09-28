<?php
include 'connection.php';



$id = $_GET['id'];
$qry = "select * from crud where Id = $id";
$data = mysqli_query($conn,$qry);
$row = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $id = $_GET['id'];
    //echo $id;
    $Name = legal_input($_POST['name']);
    $Email = legal_input($_POST['email']);
    $Date = legal_input($_POST['date']);

    $edit = "update crud set Name = '$Name',Email = '$Email',Date = '$Date' where Id =$id";
    $res=mysqli_query($conn,$edit);

    if($res==true){
        //echo "data updated successfully";
        header('location:index.php');
        
        
    }
    else{
        echo mysqli_error();
    }
}


function legal_input($value) {
    $value = trim($value);
    $value = stripslashes($value);
    $value = htmlspecialchars($value);
    return $value;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Crud</title>
</head>
<h1>PHP CRUD Operation</h1><br>

  <div class="container">
    <form action="" method="post"?>
    <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
  
    <input type='text' name='name' id='name' value="<?php echo $row['Name']; ?>" placeholder='Enter Name' required>
    <input type='email' name='email' id='email' value="<?php echo $row['Email']; ?>" placeholder='Enter Email' required> 
        
    
    <input type="date" name="date" id="" required><br>
    
    <button type="submit" name="update">Update data</button>
    </form>
    </div>
</html>