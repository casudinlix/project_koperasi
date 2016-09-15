<?php session_start();
if(isset($_SESSION['username']))
	unset($_SESSION['foto']);
unset($_SESSION['id']);
unset($_SESSION['nama']);
//unset($_SESSION['id']);
session_destroy();
	echo "<meta http-equiv='refresh' content='0;http://127.0.0.1/project_koperasi'>";
?>
