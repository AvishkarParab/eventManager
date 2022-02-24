<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../link.php" ?>
    <title>Sign Up</title>
    <?php include "../style.php" ?>
</head>
<body>
<?php include "../header.php" ?>
<div class="container-fluid w-100 row maincont">
        <div class="cont p-2 col-2 col-lg-10 col-md-9 col-sm-7 text-bold">
        <div class="title text-center p-1 my-2">
            <h4>USER SIGNUP</h4>
        </div>
        <form action="../db/adduser.php" method="POST">
             <div class="mb-2">
                <label for="name">Username:</label>
                <input type="text" class="form-control" name="name" id="name" autocomplete="off" placeholder="username">
            </div>
            <div class="mb-2">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="email">
            </div>
            <div class="mb-2">
                <label for="pass">Password:</label>
                <input type="password" class="form-control" name="pass" id="pass" autocomplete="off" placeholder="password">
            </div>
            <div class="mb-2">
                <label for="number">Mobile No:</label>
                <input type="text" class="form-control" name="number" id="number" autocomplete="off" placeholder="mobile no.">
            </div>
            <div class="mb-2">
                <label for="cname">Company Name:</label>
                <input type="text" class="form-control" name="cname" id="cname" autocomplete="off" placeholder="company name">
            </div>
            <br>
                <div class="col-12">
                <button class="btn my-2" type="submit">Submit</button>
            </div>
        </form>
        </div>
        <p class="text-center my-2">Already have an account ? <a href="./login.php" style="text-decoration: none; color:cyan;">Login in</a> </p>
    </div>
    <div class="foot row d-flex align-items-center justify-content-center w-100 me-auto">
    <div class="col-lg-8 col-md-6 col-sm-6 col-auto ">
        <p class="social text-muted mb-0 pb-0 bold-text d-flex align-items-center justify-content-center"><span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span></p>
     <small class="rights d-flex align-items-center justify-content-center">
        <span>&#174;</span> Kaptaan_Ozzy Company. All Rights Reserved.</small>
    </div>
</div>
    <?php include "../footer.php" ?>