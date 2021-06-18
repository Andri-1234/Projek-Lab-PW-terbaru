<?php

session_start();
if(!isset($_SESSION["login"])){
	header("location:login.php");
	exit;
}
require 'functions.php';
$mahasiswa=query("SELECT*FROM mahasiswa");

?>



<!DOCTYPE HTML>
<html>
<head>
	<title> Halaman data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	</head>
	

	<body style="background-color:blue">

<nav class="navbar navbar-expand-lg navbar-dark " style="background: green">
  <div class="container">
    <a class="navbar-brand" href="#">Daftar Pertemanan </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="tambah.php">Tambah data mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<br>

		<table border="1" cellpadding="10" cellspacing="0">
			<table class="table table-dark">
			<tr>
				<th scope="col">No </th>
				<th scope="col">Aksi</th>
				<th scope="col">Gambar</th>
				<th scope="col">Nama</th>
				<th scope="col">Jurusan</th>
				<th scope="col">Email</th>
			</tr>

			<?php $i=1;?>
			<?php foreach($mahasiswa as $row) : ?>
			<tr>
				<td ><?= $i; ?></td>
				<td>
					<a href="edit.php?id=<?php echo $row["id"] ; ?>">edit</a>
					<a href="hapus.php?id=<?php echo $row["id"] ; ?>" onclick="return confirm('yakin?');">hapus</a>
				</td>
				<td><img src="<?php echo $row["gambar"] ; ?>" width="50"></td>
				<td><?=$row["nama"]?></td>
				<td><?=$row["jurusan"]?></td>
				<td><?=$row["email"]?></td>
			</tr>
			<?php $i++?>
		<?php endforeach;?>
		</table>
	</body>
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">