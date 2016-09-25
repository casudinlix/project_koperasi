<?php
include "../../server/config.php";
include "../../server/all.php";

$no_anggota = $_POST['cari'];
$saldo = saldo($no_anggota);
$data['saldo']		= $saldo;
echo json_encode($data);
?>
