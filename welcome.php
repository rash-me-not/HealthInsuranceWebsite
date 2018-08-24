<html>
    <head>
        <link rel="stylesheet" type="text/css" href="./css/headerstyle.css">
        <title>Features and Benefits - HEALTH INSURANCE</title>
    </head>
    <body>
        <div class="header">
            <a href="#default" class="logo">YOUR HEALTH IS AN INVESTMENT NOT AN EXPENSE</a>
            <div class="header-right">
                <a class="active" href="home.html">Home</a>
                <a class="active" href="features.html">Features and Benefits</a>
                <a class="active" href="registration.php">Registration</a>
                <a class="active" href="login.php">Login</a>
                <a class="active" href="contact.html">Contact</a>
            </div>
        </div>
<?php
session_start();
?>
<div class="body-content">
<div class="alert alert-success"><?= $_SESSION['message'] ?></div>
Thank you for registration <span class="user"><?= $_SESSION['username'] ?></span><br>
    <span class='phone'>You will receive a phone call on <?= $_SESSION['phone']?> to discuss about different insurance plans</span>
</div>
