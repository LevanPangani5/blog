<?php
require 'config/database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <link rel="stylesheet" href="<?=ROOT_URL?>css/styles.css">
    <!--ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;
    800;900&family=Raleway:ital,wght@1,200&family=Roboto:wght@100&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="container nav__container">
            <a href="<?=ROOT_URL?>" class="nav__logo">Pangani</a>
            <ul class="nav__items">
                <li><a href="<?=ROOT_URL?>blog.php">Blog</a></li>
                <li><a href="<?=ROOT_URL?>about.php">About</a></li>
                <li><a href="<?=ROOT_URL?>services.php">Services</a></li>
                <li><a href="<?=ROOT_URL?>contact.php">Contact</a></li>
                <!--<li><a href="sign-in.html">Sign in</a></li>-->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="../images/avatar1.jpg"/>
                    </div>
                        <ul>
                            <li><a href="<?=ROOT_URL?>admin/index.php">Dashboard</a></li>
                            <li><a href="logout.html">Log out</a></li>
                        </ul>
                    

                </li>
            </ul>

            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
<!--==============END OF NAV==================-->