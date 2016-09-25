
<?php
session_start();
 //$idt=$_SESSION['nama'];
if(empty($_SESSION['id']) AND empty($_SESSION['username']) AND empty($_SESSION['role'])){
  echo '<script language="javascript">alert("Anda Harus Login Dahulu!"); document.location="logut.php";</script>';
}else{
include "server/config.php";
include "server/tgl.php";

echo "<!DOCTYPE html>
<html>";
//error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
include "atas.php";

if ($_GET['page']=="home") {
  include "modul/home.php";
}elseif ($_GET['page']=="anggota") {
  include "modul/anggota/anggota.php";
//  include "modul/anggota/ajax.php";
}elseif ($_GET['page']=="jenis-simpanan") {
  include "modul/config/jenis_simpanan.php";
}elseif ($_GET['page']=="jenis-pinjaman") {
 include "modul/config/jenis_pinjaman.php";
}elseif ($_GET['page']=="transaksi-simpanan") {
	include "modul/simpanan/simpanan.php";
}elseif ($_GET['page']=="transaksi-penarikan") {
	include "modul/pengambilan/pengambilan.php";
}elseif ($_GET['page']=="laporan-tabungan") {
	include "modul/laporan/laporan_tabungan.php";
}elseif ($_GET['page']=="profil") {
	include "modul/config/profil.php";
}elseif (expr) {
	
}
?>


  <?php include "bawah.php";


}
?>

</body>
</html>
