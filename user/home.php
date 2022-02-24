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
    <title>Home</title>
    <style>
        .card{
            height: 400px;
            /* width: 200px; */
            margin-left: 30px;
            border-radius: 20px;
            box-shadow: 5px 5px 2px black;
            background-color: rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(3px);
            border: 2px solid cyan;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<?php include "../user/header.php" ?>
<div class="container-fluid user w-50 my-2 mb-3">
    <h2 class="text-center text-uppercase" style="color: white;"><i class="bi bi-person-circle"></i></i> Welcome <?php echo $_SESSION["uname"]; ?></h2>
</div>
<div class="mt-3 w-100 text-right">
<?php
    include("../db/dbconnect.php");
    $eque='select * from assign natural join event where uid="'.$_SESSION["uid"].'" order by eid desc';
    $result= $conn->query($eque);
    if($result){
        if($result->num_rows>0){
        while($eve= $result->fetch_assoc()){
            $aque = 'select * from assign natural join admin where uid="'.$_SESSION["uid"].'" and eid="'.$eve["eid"].'"';
            $res=$conn->query($aque);
                if($res){
                    if($res->num_rows>0){
                        while($adm= $res->fetch_assoc()){
                            $admin=$adm["name"];
                        }
                    }else{
                        $admin="NOT ASSIGNED";
                    }
                    
                }
                $res1=$conn->query('select * from requirements where r_eid="'.$eve["eid"].'";');
                if($res1){
                    if($res1->num_rows>0){
                        while($req= $res1->fetch_assoc()){
                            ?>
                    <div class="col-lg-8 col-12 card container ms-auto p-3" style="color: cyan;">
                    <H3 class="text-light">DETAILS</H3>
                    <div>
                        <h6">EVENT ID: <?php echo $eve["eid"]; ?></h6>
                    </div>
                    <div>
                        <h6">EVENT NAME: <?php echo $eve["ename"]; ?></h6>
                    </div>
                    <div>
                        <h6">TYPE: <?php echo $eve["type"]; ?></h6>
                    </div>
                    <div>
                        <h6">VENUE: <?php echo $eve["venue"]; ?></h6>
                    </div>
                    <div>
                        <h6">DATE: <?php echo $eve["date"]; ?></h6>
                    </div>
                    <div>
                        <h6">TIME: <?php echo $eve["time"]; ?></h6>
                    </div>
                    <div>
                        <h6">ADMIN ID: <?php echo $admin; ?></h6>
                    </div>
                    <H3 class="text-light">REQUIREMENTS</H3>
                    <div>
                        <h6">DECORATOR: <?php echo $req["decorator"]; ?></h6>
                    </div>
                    <div>
                        <h6">CATERING: <?php echo $req["catering"]; ?></h6>
                    </div>
                    <div>
                        <h6">MUSIC: <?php echo $req["music"]; ?></h6>
                    </div>
                    <div>
                        <h6">SECURITY: <?php echo $req["security"]; ?></h6>
                    </div>
                    <div>
                        <h6">CUSTOM NEEDS: <?php echo $req["cneed"]; ?></h6>
                    </div>

                </div>
                <?php 
                        }
                    }
                    
                }

            
           
        }
    }else{
        ?>
        <div class="text-light" style="height:100vh;">
            <h2>No Booked Events.</h2>
            <br>
            <h3> Go Book Your First Event.</h3>
        </div>
        <?php
    }
 }
?>
</div>

<?php include "../footer.php" ?>