<?php 
    session_start();
?>
<?php
    include ("../db/dbconnect.php");
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $querry= "select * from user";
    $result = mysqli_query($conn,$querry);
    

    $found = false;
if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            if($email==$row["email"] && $pass==$row["password"]){
                $_SESSION["uname"]= $row["name"];
                $_SESSION["uid"]= $row["uid"];
                    header("location:../user/home.php");
                $found = true;
            }
        }
        if(!$found){
            echo '<script>alert("Invalid Email or Password.")</script>';
            echo '<script>window.location.href="../user/login.php"</script>';
        }
           
    }else{
            echo "0 results";
            echo '<script>alert("Invalid Email or Password.")</script>';
            echo '<script>window.location.href="../user/login.php"</script>';
    }
    mysqli_close($conn);
?>