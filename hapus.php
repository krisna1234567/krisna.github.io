<?php 

	require 'functions.php';

	$id= $_GET["id"];
	// pengecekan apakah penghapusan berhasil atau tidak
	if (hapus($id) > 0) { 
	// bila berhasil maka akan bernilai lebih dr 0, karena ada baris yang terpengaruhi
		echo "
			<script>
				alert('Data berhasil dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data gagal dihapus!');
				document.location.href = 'index.php';
			</script>
		";
	}
	// akhir bagian 5

 ?>