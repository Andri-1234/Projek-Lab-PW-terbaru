<?php

session_start();
if(!isset($_SESSION["login"])){
	header("location:login.php");
	exit;
}
require 'functions.php';
if(isset($_POST["submit"])){


	if(tambah($_POST)>0 ){
		echo "
		<script>
		alert('data berhasil ditambahkan');
		document.location.href='index.php';
		</script>
		";
	} else {
		echo "
		<script>
		alert('data gagal ditambahkan');
		document.location.href='index.php';
		</script>
		";

	}

	}	
?>

<!DOCTYPE HTML>
<html>
<head>
	<title> Tambah data teman</title>
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

		<h1> Tambah data teman</h1>

		<div class="container">
		<form action="" method="post">
					<label for="gambar"> Gambar :</label>
					<input type="text" name="gambar" id="gambar" required><br>
					<label for="nama"> Nama   :</label>
					<input type="text" name="nama" id="nama" required><br>
					<label for="jurusan"> Jurusan :</label >
					<input type="text" name="jurusan" id="jurusan" required><br>
					<label for="email"> Email   :</label>
					<input type="text" name="email" id="email" required><br>
					<button type="submit" name="submit"> Tambah Data</button>
		</form>
	</div>
	</body>
</html>