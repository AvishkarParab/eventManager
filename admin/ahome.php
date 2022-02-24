<?php 
    session_start();
    if(!isset($_SESSION["aname"])){
      header("location:./adminlogin.php");
      echo '<script>alert("Please Login Again.")</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin/adminstyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php include "../user/homelink.php" ?>
    <title>Home</title>
    <style>
      td{
        border: 2px solid white;
      }
      th{
        border: 1px solid white;
      }
    </style>
</head>
<body>
<?php include "../admin/header.php" ?>
    <div class="container-fluid admin w-50 mb-3 my-2">
        <h2 class="text-center text-uppercase" style="color:chartreuse;"><i class="bi bi-person-badge-fill"></i> Welcome <?php echo $_SESSION["aname"]; ?></h2>
    </div><br>
<div class="container">
<table class="table text-light" >
  <thead class="thead-light border border-light">
    <tr class="text-center" style="background-color: rgba(0, 0, 230, 0.2);">
      <th scope="col">EVENT ID</th>
      <th scope="col">USER ID</th>
      <th scope="col">ADMIN ID</th>
      <th scope="col">EVENT NAME</th>
      <th scope="col">TYPE</th>
      <th scope="col">VENUE</th>
      <th scope="col">DATE</th>
      <th scope="col">TIME</th>
    </tr>
  </thead>
  <tbody style="backdrop-filter: blur(2px); background-color:rgba(0, 0, 0, 0.5)">
    
        <?php
            include("../db/dbconnect.php");
            $result = $conn->query("SELECT * from assign natural join event;");
            if($result->num_rows>0){
                while($ale = $result->fetch_assoc()){
                   ?>
                   <tr class="text-center" style="color: cyan;">
                    <td><?php echo $ale["eid"] ; ?></td>
                    <td><?php echo $ale["uid"] ; ?></td>
                    <td><?php echo $ale["aid"] ; ?></td>
                    <td><?php echo $ale["ename"] ; ?></td>
                    <td><?php echo $ale["type"] ; ?></td>
                    <td><?php echo $ale["venue"] ; ?></td>
                    <td><?php echo $ale["date"] ; ?></td>
                    <td><?php echo $ale["time"] ; ?></td>
                    </tr>
                   <?php
                }
            }
        
        ?>
      

    
  </tbody>
</table>
</div>
<?php include "../footer.php" ?>