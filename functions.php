<?php

$link =mysqli_connect("localhost","root","","duniakampus");


function query($query){
	global $link;
	$result=mysqli_query($link,$query);
	$rows=[];
	while($row =mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}

	return $rows;
}

function tambah($data){
	global $link;
	$gambar=htmlspecialchars($data["gambar"]);
	$nama=htmlspecialchars($data["nama"]);
	$jurusan=htmlspecialchars($data["jurusan"]);
	$email=htmlspecialchars($data["email"]);

	$query="INSERT INTO mahasiswa
			VALUES
			('','$gambar','$nama','$jurusan','$email')
			";
	mysqli_query($link,$query);

	return mysqli_affected_rows($link);
}

function hapus($id){

	global $link;
	mysqli_query($link,"DELETE FROM mahasiswa WHERE id=$id");

	return mysqli_affected_rows($link);
}

function edit($data){
	global $link;
	$id=$data["id"];
	$gambar=htmlspecialchars($data["gambar"]);
	$nama=htmlspecialchars($data["nama"]);
	$jurusan=htmlspecialchars($data["jurusan"]);
	$email=htmlspecialchars($data["email"]);

	$query="UPDATE  mahasiswa SET
		gambar='$gambar',
		nama='$nama',
		jurusan='$jurusan',
		email='$email'
		WHERE id=$id
		";
			
	mysqli_query($link,$query);

	return mysqli_affected_rows($link);

}

function registrasi($data){
	global $link;

	$username= strtolower(stripslashes($data["username"]));
	$password=mysqli_real_escape_string($link,$data["password"]);
	$password2=mysqli_real_escape_string($link,$data["password2"]);

	//cek apakah sudah ada user
	$result=mysqli_query($link,"SELECT username FROM user WHERE username='$username' ");

	if(mysqli_fetch_assoc($result)){

		echo"<script>
				alert('username sudah terdaftar!')
			</script>";

			return false;
	}

	//cek konfirmasi password
	if($password !== $password2){
		echo "<script>
		alert('konfirmasi password tidak sesuai !');
		</script>";
		return false;
	}

	$password=password_hash($password,PASSWORD_DEFAULT);

	mysqli_query($link,"INSERT INTO user VALUES ('','$username','$password')");

	return mysqli_affected_rows($link);
}
?>
