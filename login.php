<?php
session_start();
$_SESSION['message']='';

$mysqli = new mysqli('localhost','root','root@1234','accounts');

if($_SERVER['REQUEST_METHOD']=='POST')
{

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql =  "SELECT id FROM accounts WHERE username = '$username' and password = '$password'";
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
        session_register("username");
        $_SESSION['username'] = $username;

        header("location: loginwelcome.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}
  ?>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="./css/headerstyle.css">
      <title>REGISTRATION</title>
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
    <h3 class="fw-title">LOGIN:</h3><!-- ParagraphTitleEnd -->
        <div class="container">
          <form action="loginwelcome.php" method="post">
              <div class="alert alert-error"><?= $_SESSION['message'] ?>
              </div>
              <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
              <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
              <input type = "submit" value = " Submit "/><br />
          </form>
      </div>
</body>
</html>
