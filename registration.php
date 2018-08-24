<?php
session_start();
$_SESSION['message']='';

$mysqli = new mysqli('localhost','root','root@1234','accounts');

if($_SERVER['REQUEST_METHOD']=='POST')
{
    if($_POST['password']==$_POST['confirm_password']){

        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = md5($_POST['password']);
        $_SESSION['username'] = $username;
        $_SESSION['phone'] = $phone;
        $sql = "INSERT INTO userdetails(username,email,phone,password) VALUES ('$username','$email','$phone','$password')";

        if($mysqli->query($sql) === TRUE )
{
    $_SESSION['message']= "New record created";
	header("location:welcome.php");
}

else
{ $_SESSION['message'] = "Error: ".$sql."<br>".$mysqli->error;
}
     $mysqli->close();

    }
    else
	{ $_SESSION['message']="Passwords do not match";
header('Location: registration.php');}
}
?>
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
    <h3 class="fw-title">REGISTRATION:</h3><!-- ParagraphTitleEnd -->
    <div class="container">
      <form action="registration.php" method="post">
          <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
          <input type="text" placeholder="Username" name="username" required size=30><br><br>
          <input type="email" placeholder="Email" name="email" required size=30><br><br>
          <input type="text" placeholder="Phone" name="phone" required size=30><br><br>
          <input type="password" placeholder="Password" name="password" required size=30><br><br>
          <input type="password" placeholder="Confirm Password" name="confirm_password" required size=30><br><br>
          <input type="submit" name="submit" required size=30>
      </form>
    </div>
</body>
