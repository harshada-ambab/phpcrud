<?php
include 'db.php';
$obj = new dbconfig();


    $id = $_GET['id'];

    $data = $obj->fetch_single($id);
    
    if(isset($_POST['update'])){
        $Name = $_POST['name'];
        $Email = $_POST['email'];

        $update = $obj->edit($Name,$Email,$id);

        if($update==true){
            echo "<script>alert('record updated successfully');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        }else{
            echo "<script>alert('record update failed');</script>";
            echo "<script>window.location.href = 'edit.php';</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Crud In OOPS</title>
</head>
<body>
<div class="container">
<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" value="<?php echo $data['Name'];?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email address</label>
    <input type="email" name="email" class="form-control" value="<?php echo $data['Email'];?>" id="exampleInputPassword1" placeholder="Enter email" required>
  </div>
  
  <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>
</div>