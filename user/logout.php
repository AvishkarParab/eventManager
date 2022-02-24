<?php
    session_start();
    echo '<script>alert("You are Logging Out Thanks for Visiting.")</script>';
    session_destroy();
    header("location:./login.php");
?>