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
    <title>Document</title>
</head>
<style>
    .ii input{
        background: rgba(0, 0, 0, 0.5);
            border: 1px solid cyan;
            padding-left: 5px;
            height:35px;
            border-radius: 12px;
            color: cyan;
    }
    .ii input::placeholder{
        color: cyan;
    }
    td,th{
        border: 2px solid white;
    }
</style>
<body>
<?php include "../admin/header.php" ?>
    <div class="container-fluid admin w-50 my-2">
        <h2 class="text-center text-uppercase" style="color: red;"><i class="bi bi-x-octagon-fill"></i> NOT ASSIGNED EVENTS</h2>
    </div><br>
    <div class="text-end pr-4 container">
        <form action="" method="POST" class="ii">
        <i class="bi bi-caret-right-fill" style="color:cyan;font-size:20px"></i>
            <input type="number" class="p-2" name="eid" id="eid" placeholder="Enter Event Eid">
            <button type="submit" class="mx-2 btn btn-outline-info" name="submit" id="submit" style="border-radius: 12px;"><i class="bi bi-lightning-charge-fill"></i>     Take Charge</button>
        </form>
        <?php
            
            if(isset($_POST["submit"])){
                include("../db/dbconnect.php");
                $que='update assign set aid="'.$_SESSION["aid"].'" where eid="'.$_POST["eid"].'";';
                if($conn->query($que)){
                    echo '<script>alert("Successfully Assigned the Event!")</script>';
                }
            }
            
            
        ?>
    </div>
    <br>
    <div class="container">
<table class="table text-light">
  <thead class="thead-light border border-warning">
    <tr class="text-center" style="background-color:rgba(60, 90, 150, 0.45);">
      <th scope="col">EVENT ID</th>
      <th scope="col">USER ID</th>
      <th scope="col">EVENT NAME</th>
      <th scope="col">TYPE</th>
      <th scope="col">VENUE</th>
      <th scope="col">DATE</th>
      <th scope="col">TIME</th>
    </tr>
  </thead>
  <tbody class="border border-info" style="background-color:rgba(0, 0, 0, 0.45);color:cyan;backdrop-filter:blur(2px);">
    
        <?php
            include("../db/dbconnect.php");
            $result = $conn->query("SELECT * from assign natural join event where aid is null;");
            if($result->num_rows>0){
                while($ale = $result->fetch_assoc()){
                   ?>
                   <tr class="text-center">
                    <td class=""><?php echo $ale["eid"] ; ?></td>
                    <td><?php echo $ale["uid"] ; ?></td>
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