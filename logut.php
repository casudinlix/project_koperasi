<?php session_start();
if(isset($_SESSION['username']))
	unset($_SESSION['foto']);
//unset($_SESSION['role']);
session_destroy();
	echo "<meta http-equiv='refresh' content='0;index.php'>";
?>
