<?php
session_start();
require 'config/constants.php';

//get back form data if there was a problem
$firstname= $_SESSION['signup-data']['firstname'] ?? null;
$lastname= $_SESSION['signup-data']['lastname'] ?? null;
$username= $_SESSION['signup-data']['username'] ?? null;
$email= $_SESSION['signup-data']['email'] ?? null;
$createpassword= $_SESSION['signup-data']['createpassword'] ?? null;
$confirmpassword= $_SESSION['signup-data']['confirmpassword'] ?? null;
unset($_SESSION['signup-data']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="./css/styles.css">
    <!--ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;
    800;900&family=Raleway:ital,wght@1,200&family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Sign Up</h2>
        <?php
            if(isset($_SESSION['sign-up'])): ?>
            <div class="alert__message error">
              <p>
                <?=$_SESSION['sign-up'];
                  unset($_SESSION['sign-up']);
                ?>
            </p>
            </div>
        <?php endif ?>

            
    
        <form action="<?= ROOT_URL?>signup-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="firstname" value="<?=$firstname ?>" placeholder="First Name">
            <input type="text" name="lastname" value="<?=$lastname ?>" placeholder="Last Name">
            <input type="text" name="username" value="<?=$username ?>" placeholder="Username">
            <input type="email" name="email" value="<?=$email ?>" placeholder="Email">
            <input type="password" name="createpassword" value="<?=$createpassword ?>" placeholder="Create Password">
            <input type="password" name="confirmpassword" value="<?=$confirmpassword ?>" placeholder="Confirm Password">
            <div class="form__control">
                <label for="avatar">User avatar</label>
                <input type="file" name="avatar" id="avatar" style="cursor:pointer;">
            </div>
            <button type="submit" name="submit"class="btn">Sign up</button>
            <small>Already have an acount? <a href="<?=ROOT_URL?>sign-in.php">Sign In</a></small>
        </form>
    </div>
</section>
    <script src="./js/main.js"></script>
</body>
</html>
