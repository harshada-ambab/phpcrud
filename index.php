<?php
include 'crud.php';
//include 'edit.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crud</title>
</head>
<body>
    <div class="container">
        <h1>PHP CRUD Operation</h1><br>
        <form action="<?php echo ($_SERVER["PHP_SELF"]); ?>" method="post">
        <p style="color:red"><?php if(!empty($msg)){echo $msg; }?></p>
        
        <input type='text' name='name' id='name' placeholder='Enter Name' required>
        <input type='email' name='email' id='email' placeholder='Enter Email' required> 
            
        
        <input type="date" name="date" id="" required><br>
        <button type="submit" name="insert">Insert data</button>
        
        </form>
        <br><br>
        <hr>
        <br>


          <div class="table">
          <table>
            <tr>
              <th>Sr No</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
  <?php
      include 'connection.php';
      $result_per_page = 3 ;
      $qry = "select * from crud";
      $rs = mysqli_query($conn,$qry);
      $NOR = mysqli_num_rows($rs);
      
      $NOP = ceil($NOR/$result_per_page);
  
      if (!isset ($_GET['page']) ) {  
          $page = 1;  
      } else {  
          $page = $_GET['page'];  
      }  

      $first_result = ($page-1)*$result_per_page;

      $fetch= "select * from crud limit $first_result,$result_per_page";
      $result = mysqli_query($conn,$fetch);
      while($data = mysqli_fetch_array($result))
      {
  ?>
    <tr>
      <td><?php echo $data['Id']; ?></td>
      <td><?php echo $data['Name']; ?></td>
      <td><?php echo $data['Email']; ?></td>
      <td><?php echo $data['Date']; ?></td>
      <td><a href="edit.php?id=<?php echo $data['Id']; ?>">Edit</a></td>
      <td><a href="delete.php?id=<?php echo $data['Id']; ?>">Delete</a></td>
    </tr>
  <?php
      }
    
  ?>
  
  </table>
</div>



    <?php
    echo "<div class='pagination'>";
    for($i = 1; $i<= $NOP; $i++) {  
      if ($i == $page) {   
        echo "<a class = 'active' href='index.php?page="  
                                          .$i."'>".$i." </a>";   
      }               
      else  {   
        echo  "<a href='index.php?page=".$i."'>   
                                            ".$i." </a>";     
      }   
    };
    echo $pagLink;
    echo "</div>";
    ?>

  </div>
</body>
</html>