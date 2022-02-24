<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/homestyle.css">
    <?php include "../user/homelink.php" ?>
    <title>Update</title>
    <style>
      body{
        height: auto;
        width: auto;
      }
        .bookcont{
            border: 2px solid cyan;
            color: cyan;
            border-radius: 20px;
            background-color: rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(6px);
        }
        label{
          margin-bottom: 5px;
          margin-left: 15px;
        }
        input,select,option, textarea{
            background: transparent!important;
            border: 1px solid cyan !important;
            color: cyan !important;
            margin-bottom: 25px !important;
            margin-left: 15px;
        }
        option{
            background: rgba(0, 0, 0, 0.9) !important;
        }
        input::placeholder,option::placeholder{
            color: cyan !important;
        }
        input[type=checkbox]:checked{
          background-color: cyan !important;
          border-radius: 50% !important;
        }
        .btn{
            background-color:rgba(0, 0, 0, 0.8);
            color: cyan;
            border: 2px solid black;
            border-radius: 10px;
            border: 1px solid cyan;
        }
        .btn:hover{
            background-color:cyan;
            color:black;
        }
    </style>
</head>
<body>
    <div class="container-fluid user w-50 my-2">
        <h2 class="text-center text-uppercase" style="color: cyan;"><i class="bi bi-book"></i> Update Requirements</h2>
    </div>
<div class="container bookcont mb-3">
<form action="" method="POST" class="mt-2 mx-2 mb-3">
  <br>
  <div>
        <h5>Event Id: <?php echo $_GET["id"];?></h5>
    </div>
  <?php
  if(! $_GET["id"]){
    ?>
    <h4>Enter a valid Event Id </h4>
    <?php
  }
    include("../db/dbconnect.php");
    $re = $conn->query('select * from requirements where r_eid="'.$_GET["id"].'"');
    while($requir=$re->fetch_assoc()){
      $re = $conn->query('select venue from event where eid="'.$_GET["id"].'"');
    while($venu=$re->fetch_assoc()){
      ?>
            <div class="form-group">
    <label for="venue">DECORATOR</label>
    <input type="text" class="form-control w-25" id="venue" name="deco" placeholder="Enter Event Decorator" value="<?php echo $requir["decorator"];?> ">
  </div>
  <div class="form-group">
    <label for="venue">CATERER</label>
    <input type="text" class="form-control w-25" id="venue" name="cat" placeholder="Enter Event Caterer" value="<?php echo $requir["catering"];?> ">
  </div>
  <div class="form-group">
    <label for="venue">MUSIC</label>
    <input type="text" class="form-control w-25" id="venue" name="mus" placeholder="Enter Event Music" value="<?php echo $requir["music"];?> ">
  </div>
  <div class="form-group">
    <label for="venue">SECURITY</label>
    <input type="text" class="form-control w-25" id="venue" name="sec" placeholder="Enter Event Security" value="<?php echo $requir["security"];?> ">
  </div>
  <div class="form-group">
    <label for="venue">VENUE</label>
    <input type="text" class="form-control w-25" id="venue" name="ven" placeholder="Enter Event Venue" value="<?php echo $venu["venue"];?> ">
  </div>
      <?php
    }
  }
  ?>

  <div class="text-center">
     <button class="btn my-2" name="submit" type="submit">UPDATE  <i class="bi bi-upload"></i></button>
  </div>
</form>
</div>
    
<!-- booking -->
<?php
    if(isset($_POST["submit"])){
      include("../db/dbconnect.php");
      if($conn->query('update requirements set decorator="'.$_POST["deco"].'",catering="'.$_POST["cat"].'",music="'.$_POST["mus"].'",security="'.$_POST["sec"].'" where r_eid="'.$_GET["id"].'";')){
              $conn->query('update event set venue="'.$_POST["ven"].'" where eid="'.$_GET["id"].'";');
              echo '<script>alert("Requirements Updated !!")</script>';
              echo '<script>window.location.href="./aevents.php"</script>';
            
      }
      else{
        echo "Error in booking";
      }
    }
?>
<!-- <?php include "../footer.php" ?> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
