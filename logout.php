<?php 
	
	// bagian 4 - menghapus login session
	session_start();
	session_destroy();

	header("Location: login.php");
	exit;

 ?>