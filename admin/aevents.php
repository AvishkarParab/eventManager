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
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>MY EVENTS</title>
    <style>
        body{
            height:auto;
            width:auto;
        }
        .admincard{
            border-radius: 20px;
            box-shadow: 3px 3px 1px white;
            background: linear-gradient(25deg,rgba(190, 0, 0,0.3),rgba(0, 0, 0,0.5));
            backdrop-filter: blur(5px);
            border: 1px solid white;
            margin-bottom: 30px;
            color:aqua;
        }
        .ad :hover{
            transition: 0.1s ease-in-out;
            color: cyan;
        }
        .card{
            height: 250px;
            width: 400px;
            margin-left: 30px;
            border-radius: 20px;
            box-shadow: 3px 3px 1.2px whitesmoke;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(3px);
            border: 2px solid cyan;
            margin-bottom: 30px;
            color:chartreuse;
        }
        .card h6{
            margin-bottom: 30px;
        }
        .incard{
            border-radius: 20px;
            box-shadow: 3px 3px 1.2px whitesmoke;
            background-color: rgba(0, 0, 150, 0.25);
            backdrop-filter: blur(3px);
            border: 2px solid cyan;
            color:greenyellow;
        }
        .inpeid input{
            background-color: rgba(0, 0, 0, 0.7);
            border: 1px solid cyan;
            border-radius: 12px;
            height: 35px;
            padding-left: 5px;
            color: cyan;
        }
        .inpeid input::placeholder{
            color: cyan;
        }
    </style>
</head>
<body>
<?php include "../admin/header.php" ?>
    <div class="container-fluid admin w-50 my-2">
        <h2 class="text-center text-uppercase" style="color:yellow"><i class="bi bi-person-badge-fill"></i> Admin Events</h2>
    </div>
        <br>

        <br>
    <div class="row container-fluid">
    <div class="col-lg-4 container lcont">
            <div class="p-3 admincard" style="height: 250px; width:100%">
            <h4 class="text-center ad" style="color:yellow;">  <i class="bi bi-info-square-fill">   ADMIN INFO CARD</i></h4><br>
             <?php
                include("../db/dbconnect.php");
                $result=$conn->query('select * from admin where aid="'.$_SESSION["aid"].'"');
                if($result){
                    while($ad= $result->fetch_assoc()){
                        ?>
                            <div class="d-flex justify-content-between mb-4">
                            <h6 class="text-uppercase" style="font-size: 18px;">NAME: <?php echo $ad["name"];?></h6>
                            <h6 class="" style="font-size: 18px;">ID: <?php echo $ad["aid"];?></h6>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                            <h6 class="" style="font-size: 16px;">EMAIL: <?php echo $ad["email"];?></h6>
                            <h6 class="" style="font-size: 16px;">CONTACT: <?php echo $ad["mobile"];?></h6>
                            </div>
                            <h6 style="font-size: 18px;">COMPANY: <?php echo $ad["cname"];?></h6>

                        <?php
                    }
                }
             ?>
                
            </div>
            <br>
            <div class="p-2 text-center incard">
                <form action="#" method="POST" class="inpeid mt-2 mb-2">
                <i class="bi bi-caret-right-fill" style="color:cyan;font-size:20px"></i>
                    <input class="w-50" style="width:100px" type="number" class="mb-2" name="eid2" placeholder="Enter eid">
                    <button class="btn btn-danger mx-2" type="submit" name="sub2" title="Delete Event"><i class="bi bi-trash-fill"></i></button>
                    <br><br>
                    <i class="bi bi-caret-right-fill" style="color:cyan;font-size:20px"></i>
                    <input class="w-50" style="width:100px" type="number" name="eid3" placeholder="Enter eid">
                    <button class="btn btn-warning mx-2" type="submit" name="sub3" title="Drop Charge"><i class="bi bi-droplet-half"></i></button>
                </form>
            </div>

    </div>
    
    <?php 
        if(isset($_POST["sub2"])){
            include("../db/dbconnect.php");
            if($conn->query('delete from event where eid="'.$_POST["eid2"].'"')){
                echo '<script>alert("Event Deleted!")</script>';
            }
        }
        if(isset($_POST["sub3"])){
            include("../db/dbconnect.php");
            if($conn->query('update assign set aid=NULL where eid="'.$_POST["eid3"].'"')){
                echo '<script>alert("Charge Dropped!")</script>';
            }
        }
    ?>
    <div class="mt-3 col-lg-8 row ms">
<?php
    include("../db/dbconnect.php");

    $eque='select * from assign natural join event where aid="'.$_SESSION["aid"].'"';
    $result= $conn->query($eque);
    if($result){
        while($eve= $result->fetch_assoc()){
            ?>
            <div class="col-lg-6 col-12 p-2 card container">
                <div class="mb-2">
                    <h6 class="d-inline mx-3">EVENT ID: </h6><h6 class="mx-3 d-inline"><?php echo $eve["eid"]; ?></h6>
                </div>
                <div class="mb-2">
                    <h6 class="d-inline mx-3">EVENT TYPE:</h6><h6 class="d-inline mx-3 text-uppercase"><?php echo $eve["type"]; ?></h6>
                </div>
                <div class="mb-2">
                    <h6 class="d-inline mx-3">EVENT NAME:</h6><h6 class="d-inline mx-3 text-uppercase"><?php echo $eve["ename"]; ?></h6>
                </div>
                <div class="mb-2">
                    <h6 class="d-inline mx-3">DATE:</h6><h6 class="d-inline mx-3"><?php echo $eve["date"]; ?></h6>
                </div>
                <div class="mb-2">
                    <h6 class="d-inline mx-3">TIME: </h6><h6 class="d-inline mx-3"><?php echo $eve["time"]; ?></h6>
                </div>
                <div class="mb-2">
                    <h6 class="d-inline mx-3">USER ID: </h6><h6 class="d-inline mx-3"><?php echo $eve["uid"]; ?></h6>
                </div>
                <div class="text-end">
                <button class="btn btn-primary mx-2"><a style="text-decoration:none;color:white;" href="update.php?id=<?php echo $eve["eid"]; ?>"><i class="bi bi-gear-wide-connected"></i>  Update</a></button>
                </div>
            </div>
            <?php
        }
    }
?>
</div>

</div>
    <?php include "../footer.php" ?>