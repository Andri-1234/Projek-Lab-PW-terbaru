<?php
session_start();
require 'functions.php';


if( isset($_SESSION["login"]) ){
  header("location :index.php");
  exit;
}


if( isset($_POST["login"])){

  $username=$_POST["username"];
  $password=$_POST["password"];

  $result=mysqli_query($link,"SELECT*FROM user WHERE username ='$username'");

  //cek username

  if(mysqli_num_rows($result)===1){

    //cek password
    $row=mysqli_fetch_assoc($result);
    if(password_verify($password,$row["password"])){
      //set session
      $_SESSION["login"]=true;
      header("Location:index.php");
      exit;
    }
  
  }

  $error=true;
}


?>



<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" href="login&registrasi.css">
        <link rel="icon" href="logo.png">
</head>
<style>
  body{
  background-image: url('bg1.jpg');
  background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    
}
  
h1 {
  text-align: center;
  padding-bottom: 5px;
  color:green;
}


.container {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  padding: 20px 25px;
  width: 300px;

  background-color: rgba(0, 0, 0, 0.7);
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.3);
}

 .container label {
  text-align: left;
  color: antiquewhite;
}
.container form input {
  width: calc(100% - 20px);
  padding: 8px 10px;
  margin-bottom: 15px;
  border: none;
  background-color: transparent;
  border-bottom: 2px solid skyblue;
  color: #fff;
  font-size: 20px;
}

.container form button {
  width: 100%;
  height: 40px;
  padding: 5px 0;
  border: none;
  background-color: blue;
  font-size: 10px;
  color: antiquewhite;
  border-radius: 20px;
}


  </style>

<body>

      
        <h1>  Halaman Login </h1>
        <?php if (isset($error)) : ?>
        <p style="color:red;font-style:intalic;"> username/password salah</p>
        <?php endif;?>
       
      
         <div class="container">

          <form action="" method="post">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username"><br>
                <label for="password">Password</label><br>
                <input type="password" name="password" id="password">
                <button type="submit" name="login">Log in</button><br>
               
            </form>
  </div>




</body>
</html>