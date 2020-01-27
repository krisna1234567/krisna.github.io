<?php 
	// bagian 1 - koneksi
	$conn = mysqli_connect("localhost", "root", "", "db_mahasiswa");
	// if(!$conn)
	//        echo "Database belum terkoneksi";
	//    else
	//    	echo "koneksi Database berhasil";
	// akhir bagian 1


	// bagian 6
	function registrasi ($data) {

		global $conn;

		// mengambil data inputan
		// real_escape_string untuk pengamanan inputan
		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

		// memastikan, apakah username sudah ada atau belum
		$cekusername = "SELECT username FROM user WHERE username = '$username'";

		$result = mysqli_query($conn, $cekusername);

		// bila username sudah ada
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert ('Username sudah tedaftar!')
				  </script>";
			return false;
		}

		// bila username belum ada, maka sinkronisasi password akan dicek
		if ($password !== $password2) {
			echo "<script>
					alert ('Konfirmasi password tidak sinkron!');
				  </script>";
			return false;
		}

		// registrasi user ke database
		$query = "INSERT INTO user VALUES ('', '$username', '$password')";

		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);

	}

	function tambah($data){
		global $conn;

		$npm = $_POST['npm'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$jurusan = $_POST['jurusan'];

		$add = "INSERT INTO mahasiswa VALUES
				('','$npm','$nama','$email','$jurusan')"; 

		mysqli_query($conn, $add);

		return mysqli_affected_rows($conn);

	}
	function hapus($id){
		global $conn;
		$query = "DELETE FROM mahasiswa WHERE id = $id";
		// menjalankan query
		mysqli_query($conn, $query);
		// bila terhapus return akan bernilai 1 karena ada baris yang terhapus
		return mysqli_affected_rows($conn);

	}
	function ubah($data){
		global $conn;
		$id=$_POST["id"];
	    $npm=$_POST["npm"];
		$nama=$_POST["nama"];
		$email=$_POST["email"];
		$jurusan=$_POST["jurusan"];
		
	$query = mysqli_query($conn, "UPDATE mahasiswa SET 
		npm='$npm',
		nama='$nama',
		email='$email',
		jurusan ='$jurusan'
 		WHERE id='$id'");

 	  echo "<script>alert('Data telah diubah')
		          </script>";
      echo "<meta http-equiv='refresh' content='1;url=index.php'>";
	}

?>