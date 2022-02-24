<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../link.php" ?>
    <title>Admin_Login</title>
    <?php include "../style.php" ?>
</head>
<body>
<?php include "../admin/headadmin.php" ?>
<div class="container-fluid w-100 row maincont">
        <div class="cont p-2 col-2 col-lg-10 col-md-9 col-sm-7 text-bold">
        <div class="title text-center p-1 my-2">
        <h4>ADMIN LOGIN</h4>
        </div>
        <form action="../db/logadmin.php" method="POST">
            <div>
            <i class="bi bi-envelope-open"></i>
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="off">
            </div>
            <br>
            <div>
                <label for="pass"><i class="bi bi-key-fill"></i>  Password:</label>
                <input type="password" class="form-control" name="pass" id="pass" autocomplete="off">
            </div>
            <br>
                <div class="col-12">
                <button class="btn my-2" type="submit">Submit  <i class="bi bi-arrow-right-circle-fill"></i></button>
            </div>
        </form>
        </div>
        <p class="text-center my-2">Create a new account ? <a href="../admin/adminsignup.php" style="text-decoration: none; color:cyan;">Sign up</a> </p>
    </div>
    <div class="foot row d-flex align-items-center justify-content-center w-100 me-auto">
    <div class="col-lg-8 col-md-6 col-sm-6 col-auto ">
        <p class="social text-muted mb-0 pb-0 bold-text d-flex align-items-center justify-content-center"><span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span></p>
     <small class="rights d-flex align-items-center justify-content-center">
        <span>&#174;</span> Kaptaan_Ozzy Company. All Rights Reserved.</small>
    </div>
</div>
    <?php include "../footer.php" ?>