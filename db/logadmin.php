<?php
    session_start();
?>
<?php
    include ("../db/dbconnect.php");

    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $querry= "select * from admin";
    $result = mysqli_query($conn,$querry);
    
    $found = false;
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            if($email==$row["email"] && $pass==$row["password"])
                $_SESSION["aname"]=$row["name"];
                $_SESSION["aid"]=$row["aid"];
                header("location:../admin/ahome.php");
                $found = true;
        }
        if(!$found){
            echo '<script>alert("Invalid Email or Password.")</script>';
            echo '<script>window.location.href="../admin/adminlogin.php"</script>';
        }
    }else{
            echo "0 results";
            echo '<script>alert("Invalid Email or Password.")</script>';
            echo '<script>window.location.href="../admin/adminlogin.php"</script>';
    }
    
?>
    
    