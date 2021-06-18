<?php

require 'functions.php';
if( isset($_POST["register"])){

	if(registrasi($_POST)>0){
echo"<script>
		alert('user berhasil ditambahkan')
</script>";

	}else{

		echo mysqli_error($link);
	}
}

?>





<!DOCTYPE HTML>
<html>
<head>
	<title> Halaman Registrasi</title>
	<style>
		
		body{
	background-image: url('bg2.jpg');
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
	</head>

<body>
	<h1> Halaman Registrasi</h1>

	 <div class="container">
	<form action="" method="post">
				<label for="username">username :</label>
				<input type="text" name="username" id="username"><br>
				<label for="password">password :</label>
				<input type="password" name="password" id="password"><br>
				<label for="password2">Konfirmasi Password :</label>
				<input type="password" name="password2" id="password2"><br>
				<button type="submit" name="register">Register</button>
			
	</form>
</div>
</body>
</html>