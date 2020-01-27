<?php 
	// bagian 5
	require 'functions.php';

	// bila button registrasi ditekan, maka akan menjalankan function registrasi
	if (isset($_POST["registrasi"])) {
		if (registrasi($_POST) > 0) {
			// > 0 adalah bila ada data yang berhasil ditambahkan
			echo "<script>
					alert ('User baru berhasil ditambahkan!');
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
		<h1>Halaman Registrasi</h1>
		<form action="" method="POST">
			<label for="username">Username : </label>
			<input type="text" id="username" name="username" size="40">
			<br>
			<label for="password">Password : </label>
			<input type="password" id="password" name="password" size="40">
			<br>
			<label for="password2">Konfirmasi Password : </label>
			<input type="password" id="password2" name="password2" size="40">
			<br><br>
			<button type="submit" name="registrasi">Registrasi</button>
		</form>
	</center>
</body>
</html>