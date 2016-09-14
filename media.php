<!DOCTYPE html>
<html>
<?php


session_start();
 $idt=$_SESSION['nama'];
if(!isset($_SESSION['foto'])||!isset($_SESSION['id'])){
  echo '<script language="javascript">alert("Anda Harus Login Dahulu!"); document.location="logut.php";</script>';
}

include "server/config.php";

include "atas.php";

?>


<?php include "bawah.php"; ?>
</body>
</html>
