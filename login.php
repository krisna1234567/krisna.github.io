<?php 

	// bagian 3
	session_start();

	// pengecekan, bila sudah login, maka akan dialihkan ke index.php
	if (isset($_SESSION["login"])) {
		header("Location: index.php");
		exit;
	}

	// memanggil koneksi
	require 'functions.php';

	// bila tombol login ditekan
	if (isset($_POST["login"])) {	
		
		// mengambil data user
		$username = $_POST["username"];
		$password = $_POST["password"];

		// mengecek user, apakah ada dalam database
		$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

		// bila ada, lakukan pengecekan password
		if (mysqli_num_rows($result) === 1) {
			
			$row = mysqli_fetch_assoc($result);
			if ($password == $row["password"]) {
				
				// bila berhasil maka dibuatlah session login lalu diarahkan ke index.php
				$_SESSION["login"] = true;

				header("Location: index.php");
				exit;
			}

		}

		$error = true;

	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<center>
		<h1>Halaman Login</h1>

		<!-- bila error maka akan muncul warning -->
		<?php if (isset($error)) : ?>
			<p style="color: red; font-style: italic;">
				Username / Password Salah!
			</p>
		<?php endif; ?>

		<form action="" method="POST">
			<label for="username">Username :</label>
			<input type="text" id="username" name="username">
			<br>
			<label for="password">Password :</label>
			<input type="password" id="password" name="password">
			<br><br>
			<button type="submit" name="login">Login</button>
		</form>
	</center>

</body>
</html>