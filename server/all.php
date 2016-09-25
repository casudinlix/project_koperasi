<?php
function jmlBayar($no) {
	$conn = new mysqli("localhost","cas","bintang","project_koperasi");
	$sql	= "SELECT sum(angsuran+bunga) as total FROM m_pinjaman WHERE kd_pinjam='$no'";
	$conn->query($sql);
	$data	= $sql->fetch_array();
	
	$row	= $sql->num_rows;
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function sisa($no) {
	$conn = new mysqli("localhost","cas","bintang","project_koperasi");
	$sql	= "SELECT sum(jumlah_bayar) as total FROM tt_pinjaman	WHERE kd_pinjaman='$no'";
	$conn->query($sql);
	$data	= $sql->fetch_array();
	$row		= $sql->num_rows;
	if ($row>0){
		$hasil		= $data['total'];
	}else{
		$hasil		= 0;
	}
	return $hasil;
}
function cariAnggota($noanggota) {
		$conn = new mysqli("localhost","cas","bintang","project_koperasi");

		$sql	= "SELECT *	FROM m_anggota WHERE no_anggota='$nonggota'";
		$conn->query($sql);
	$data	= $sql->fetch_array();
	$row		= $sql->num_rows;
	if ($row>0){
		$hasil		= $data['nama_anggota'];
	}else{
		$hasil		= '';
	}
	return $hasil;	
}
function cariJenis($nojenis) {
	$conn = new mysqli("localhost","cas","bintang","project_koperasi");
	$sql	= "SELECT *	FROM m_jenis_simpanan WHERE kd_jenis='$nojenis'";
	$query 	= $conn->query($sql);				
	$data	= $query->fetch_array();
	$row	= $query->num_rows;
	if ($row>0){
		$hasil		= $data['nama_jenis'];
	}else{
		$hasil		= $sql;
	}
	return $hasil;	
}
function simpanan($anggota){
		$conn = new mysqli("localhost","cas","bintang","project_koperasi");

	$sql	= $conn->query("SELECT sum(jumlah) as total FROM tt_simpanan WHERE no_anggota='$anggota'");
	$row	= $sql->num_rows;
	if($row>0){
		$data = $sql->fetch_array();
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function pengambilan($anggota){
$conn = new mysqli("localhost","cas","bintang","project_koperasi");
	$sql	= $conn->query("SELECT sum(jumlah) as total FROM tt_pengambilan WHERE no_anggota='$anggota'");
	$row	= $sql->num_rows;
	if($row>0){
		$data = $sql->fetch_array();
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}
function saldo($anggota) {
	$simpanan = simpanan($anggota);
	$pengambilan = pengambilan($anggota);
	$saldo = $simpanan-$pengambilan;
	return $saldo;
}
function sisaAngsuran($anggota){
	$conn = new mysqli("localhost","cas","bintang","project_koperasi");
	$sql	= $conn->query("SELECT b.no_anggota,sum(a.angsuran+a.bunga) as total FROM tt_pinjaman as a join m_pinjaman as b	ON a.kd_pinjaman=b.kd_pinjaman	WHERE jumlah_bayar=0 AND no_anggota='$anggota'
			GROUP BY b.no_anggota");
	$row	= $sql->num_rows;
	if($row>0){
		$data = $sql->fetch_array();
		$hasil = $data['total'];
	}else{
		$hasil = 0;
	}
	return $hasil;
}

function cariNama($nomor){
	$conn = new mysqli("localhost","cas","bintang","project_koperasi");
	$s = $conn->query("SELECT * FROM m_anggota WHERE no_anggota='$nomor'");
	$r = $s->num_rows();
	if($r>0){
		$d = $s->fetch_array();
		$hasil = $d['nama_anggota'];
	}else{
		$hasil = '';
	}
	return $hasil;
}

?>