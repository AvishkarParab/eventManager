<?php
    session_start();
    if(!isset($_SESSION["uname"])){
      header("location:./login.php");
      echo '<script>alert("Please Login Again.")</script>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../user/homestyle.css">
    <?php include "../user/homelink.php" ?>
    <title>Book</title>
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
<?php include "../user/header.php" ?>
    <div class="container-fluid user w-50 my-2">
        <h2 class="text-center text-uppercase" style="color: cyan;"><i class="bi bi-book"></i>   Book an Event</h2>
    </div>
<div class="container bookcont mb-3">
<form action="" method="POST" class="mt-2 mx-2 mb-3">
  <div class="form-group">
    <label for="ename">Event name</label>
    <input type="text" class="form-control w-25" id="ename" name="ename" placeholder="Enter Event Name">
  </div>
  <div class="form-group">
    <label for="etype">Event Type</label>
    <select class="form-control w-50" id="etype" name="etype">
      <option disabled>choose</option>
      <option value="wedding">Wedding / Engagement</option>
      <option value="birthday">Birthday</option>
      <option value="casual">Casual Event</option>
      <option value="exhibition">Exhibitions</option>
      <option value="business">Business Event</option>
      <option value="anniversary">Anniversary Event</option>
    </select>
  </div>
  <div class="form-group">
    <label for="cneed">Custom Needs</label>
    <textarea class="form-control w-50" id="cneed" name="cneed" rows="3" ></textarea>
  </div>
  <label>What do you want us to arrange?</label><br>
  <div class="d-flex justify-content-evenly">
  
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="arrange[]" value="deco">
      <label class="form-check-label" for="inlineCheckbox1">Decorator</label>
  </div>
  <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="arrange[]" value="cat">
      <label class="form-check-label" for="inlineCheckbox2">Caterer</label>
  </div>
  <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="arrange[]" value="mus">
      <label class="form-check-label" for="inlineCheckbox3">Music</label>
  </div>
  <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="arrange[]" value="sec">
      <label class="form-check-label" for="inlineCheckbox3">Security</label>
  </div>
  <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="arrange[]" value="ven">
      <label class="form-check-label" for="inlineCheckbox3">Venue</label>
  </div>
  </div>
  <div class="form-group">
    <label for="venue">Event Venue</label>
    <input type="text" class="form-control w-25" id="venue" name="venue" placeholder="Enter Event Venue">
  </div>
  <div class="form-group mt-2 mx-2">
    <label for="date">Date</label>
    <input type="date" class="form-control w-25" id="date" name="date" style="background-color: rgba(255, 255,255, 0.2) !important;">
  </div>
  <div class="form-group mt-2 mx-2">
    <label for="time">Time</label>
    <input type="time" class="form-control w-25" id="time" name="time" style="background-color: rgba(255, 255,255, 0.2) !important;">
  </div>

  <div class="text-center">
     <button class="btn my-2" name="submit" type="submit">Submit  <i class="bi bi-cloud-arrow-up"></i></button>
  </div>
</form>
</div>
    
<!-- booking -->
<?php
    if(isset($_POST["submit"])){
      $deco= "NOT REQUIRED";$cat= "NOT REQUIRED";$mus= "NOT REQUIRED";$sec= "NOT REQUIRED";
      $ven= $_POST["venue"];
      if(!empty($_POST["arrange"])){
        foreach($_POST["arrange"] as $ch){
          switch($ch){
            case 'deco':
              $deco="NOT ASSIGNED";
              break;
            case 'cat':
              $cat="NOT ASSIGNED";
              break; 
            case 'mus':
              $mus="NOT ASSIGNED";
              break;
            case 'sec':
              $sec="NOT ASSIGNED";
              break; 
            case 'ven':
              $ven="NOT ASSIGNED";
              break;
          }
        }
      }

      include("../db/dbconnect.php");
      $querry='insert into event(ename,type,venue,date,time) values("'.$_POST["ename"].'","'.$_POST["etype"].'","'.$ven.'","'.$_POST["date"].'","'.$_POST["time"].'");';
      
      // mysqli_query($querry,$conn);
      if($conn->query($querry)){
        $rque ='select max(eid) from event;';
        $res=$conn->query($rque);
        if ($res) {
          while ($row = $res->fetch_assoc()) {
            $req='insert into requirements(r_eid,decorator,catering,music,security,cneed) values("'.$row["max(eid)"].'","'.$deco.'","'.$cat.'","'.$mus.'","'.$sec.'","'.$_POST["cneed"].'");';
            if($conn->query($req)){
              $conn->query('insert into assign(uid,eid) values("'.$_SESSION["uid"].'","'.$row["max(eid)"].'");');
              echo '<script>alert("Event Booked Successfully")</script>';
            }
              
          }
          
      }
        
      }
      else{
        echo "Error in booking";
      }
    }
?>
<!-- <?php include "../footer.php" ?> -->
<script>
const l1 = document.querySelector(".l1");
    const l2 = document.querySelector(".l2");
    const l3 = document.querySelector(".l3");
    const x = window.location.pathname;
    console.log(x);
    if(x.includes("ahome.php"))
        l1.classList.add("act");
    else if(x.includes("aevents.php"))
        l2.classList.add("act");
    else if(x.includes("assign.php"))
        l3.classList.add("act");

        console.log(x);
    if(x.includes("home.php"))
        l1.classList.add("act");
    else if(x.includes("book.php"))
        l2.classList.add("act");
    else if(x.includes("gallery.php"))
        l3.classList.add("act");
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
