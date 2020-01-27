<!-- bagian 2 -->
<?php
	// memuliai session
	session_start();
	
	// pengecekan, apakah sudah ada session login atau belum
	// bila belum maka akan diarahkan ke halaman login
	if (!isset($_SESSION["login"])) {
		header("Location: login.php");
		exit;
	}
	require 'functions.php';
	$mahasiswa =mysqli_query($conn, "SELECT * FROM mahasiswa");

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<center>
		<h1>Selamat datang admin</h1>
		<button><a href="logout.php">Logout</a></button>
		<button><a href="tambah.php">Tambah Data</a></button>
		<br>
		<br>
	
		<table border="1">
			<tr>
				<td>Npm</td>
				<td>Nama</td>
				<td>Email</td>
				<td>Jurusan</td>
				<td>Aksi</td>
			</tr>
			<?php $no =1; ?>
			<?php foreach ($mahasiswa as $mhs){ ?>
			<tr>
				<td><?= $mhs['npm'] ?></td>
				<td><?= $mhs['nama'] ?></td>
				<td><?= $mhs['email'] ?></td>
				<td><?= $mhs['jurusan'] ?></td>
				<td>
					<a href="hapus.php?id=<?= $mhs["id"]; ?>">Hapus</a> ||
					<a href="Ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a>
				</td>
			</tr>
			<?php $no++; } ?>
		</table>
	</center>
</body>
</html>