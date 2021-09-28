<?php

include 'db.php';
$obj = new dbconfig();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Crud In OOPS</title>
</head>
<body>
<div class="container">
<form action="index.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Enter email" required>
  </div>
  
  <button type="submit" name="btn_save" class="btn btn-primary">Insert</button>
</form>

<?php
    
    if(isset($_POST['btn_save'])){
        $Name = $_POST['name'];
        $Email = $_POST['email'];

        
            $res=$obj->insert($Name,$Email);

            if($res)
            {
                echo '<div class="alert alert-success"> Your Record Has Been Saved</div>';
            }
            else{
                echo "Error";
            }
    }
?>
<hr>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $result_per_page=3;
        if(isset($_GET['page']))
        {
            $page=$_GET['page'];
        }else{
            $page=1;
        }
        $start_from=($page-1)*$result_per_page;
        $getd = $obj->get_data($result_per_page,$start_from);
        
        while($data = mysqli_fetch_array($getd))
        {
    ?>
    <tr>
      <th scope="row"><?php echo $data['id'] ?></th>
      <td><?php echo $data['Name'] ?></td>
      <td><?php echo $data['Email'] ?></td>
      <td><a href="edit.php?id=<?php echo $data['id'] ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
      <td><a href="index.php?id=<?php echo $data['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>

<?php
    
    echo "<ul class = 'pagination'>";
        $res=$obj->pagination();
        $total_pages=ceil($res/$result_per_page);
        for($i=1; $i<=$total_pages; $i++){
            if ($i == $page) {   
                echo "<li class = 'active' ><a href='index.php?page="  
                                                  .$i."'>".$i." </a></li>";   
              }               
              else  {   
                echo  "<li><a href='index.php?page=".$i."'>   
                                                    ".$i." </a></li>";     
              }   
        }
    echo "</ul>";
   
?>

    <?php
         if(isset($_GET['id'])){
             $id = $_GET['id'];
            $res2= $obj->delete($id);
            if($res2==true){
                echo "<div class='alert alert-primary' role='alert'>
                        Data has deleted Successfully.
                     </div>";
            }else{
                echo "<div class='alert alert-danger' role='alert'>
                        Something went wrong, please try again !
                    </div>";
            }
         }
        
    ?>

    <?php
    
         
    ?>
</div>
</body>
</html>