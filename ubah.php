<?php 
	// bagian 5
    require 'functions.php';
    $id = $_GET['id'];
	// bila button registrasi ditekan, maka akan menjalankan function registrasi
	if (isset($_POST["ubah"])) {
		if (ubah($_POST) > 0) {
			// > 0 adalah bila ada data yang berhasil ditambahkan
			echo "<script>
                    alert ('Data baru berhasil ditambahkan!');
                    document.location.href = 'index.php';
				  </script>";
		} else {
			echo mysqli_error($conn);
		}
    }


    $mahasiswa =mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id= $id");
    $mhs = mysqli_fetch_assoc($mahasiswa);
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
            <input type="hidden" id="id" name="id" value="<?= $mhs['id']  ?>" size="40">
			<label for="username">Npm : </label>
			<input type="text" id="username" name="npm" value="<?= $mhs['npm']  ?>" size="40">
			<br>
			<label for="password">Nama : </label>
			<input type="text" id="password" name="nama" value="<?= $mhs['nama']  ?>" size="40">
			<br>
			<label for="password2">Email : </label>
			<input type="email" id="password2" name="email" value="<?= $mhs['email']  ?>" size="40">
			<br>
            <label for="password2">Jurusan : </label>
			<input type="text" id="password2" name="jurusan" value="<?= $mhs['jurusan']  ?>" size="40">
			<br>
            <br>
			<button type="submit" name="ubah">Ubah</button>
		</form>
	</center>
</body>
</html>