
<?php
session_start();
 //$idt=$_SESSION['nama'];
if(empty($_SESSION['id'])){
  echo '<script language="javascript">alert("Anda Harus Login Dahulu!"); document.location="logut.php";</script>';
}else{
include "server/config.php";
echo "<!DOCTYPE html>
<html>";
include "atas.php";

if ($_GET['page']=="home") {
  include "modul/home.php";
}elseif ($_GET['page']=="anggota") {
  # code...
}elseif ('condition') {
  # code...
}
?>


  <?php include "bawah.php";


}
?>

</body>
</html>
