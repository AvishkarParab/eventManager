<?php
    include ("./dbconnect.php");

    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $mob = $_POST["number"];
    $cname = $_POST["cname"];

    $querry= "insert into user(name,email,password,mobile,cname) values('".$name."','".$email."','".$pass."','".$mob."','".$cname."');";
    if(mysqli_query($conn,$querry)){
        echo "<br>New record inserted successfully";
        header("location:../user/login.php");
    }else {
        echo "Error: " . $querry . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    
?>
    
    