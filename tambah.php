<?php 
	// bagian 5
	require 'functions.php';
	// bila button registrasi ditekan, maka akan menjalankan function registrasi
	if (isset($_POST["tambah"])) {
		if (tambah($_POST) > 0) {
			// > 0 adalah bila ada data yang berhasil ditambahkan
			echo "<script>
                    alert ('Data baru berhasil ditambahkan!');
                    document.location.href = 'index.php';
				  </script>";
		} else {
			echo mysqli_error($conn);
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<style>label { display: block; }</style>
	<title>Registrasi</title>
</head>
<body>
	<center>
		<h1>Halaman Tambah Data Mahasiswa</h1>
		<form action="" method="POST">
			<label for="username">Npm : </label>
			<input type="text" id="username" name="npm" size="40">
			<br>
			<label for="password">Nama : </label>
			<input type="text" id="password" name="nama" size="40">
			<br>
			<label for="password2">Email : </label>
			<input type="email" id="password2" name="email" size="40">
			<br>
            <label for="password2">Jurusan : </label>
			<input type="text" id="password2" name="jurusan" size="40">
			<br>
            <br>
			<button type="submit" name="tambah">Registrasi</button>
		</form>
	</center>
</body>
</html>