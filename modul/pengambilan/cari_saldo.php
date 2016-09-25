<?php
include "../../server/config.php";
include "../../server/all.php";

$noanggota=$_POST['cari'];
$saldo = saldo($noanggota);
$data['saldo']= $saldo;
echo json_encode($data);
?>
