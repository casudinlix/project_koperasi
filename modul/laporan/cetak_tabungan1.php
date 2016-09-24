<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF
include "../../server/config.php";

include "../../server/tgl.php";
require('../../pdf/invoice.php');
include "../../server/all.php";
session_start();
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$profil =$conn->query("SELECT * FROM profil");
$data=$profil->fetch_array();

$kode	= $_GET['id'];
$where	= " WHERE no_anggota ='$kode'";
$q = $conn->query("SELECT * FROM tt_simpanan $where");
$row = $q->num_rows;
if($row>0){

$q	= $conn->query("SELECT * FROM m_anggota WHERE no_anggota='$kode'");
$d 	= $q->fetch_array();
$nama 	= $d['nama_anggota'];


 
}

$pdf->AddPage();
$pdf->addSociete( $data['koperasi'],"Alamat:\n" .$data['alamat']."\n"."Kota :".$data['kota']);
//$pdf->fact_dev( "Buku ", "Tabungan" );
$pdf->temporaire( "Rumah Kreasi" );
$pdf->Image("../../img/pp.jpg",170,10,25,45);
//$pdf->addClient($nama);
//$pdf->addPageNumber("1");
//$pdf->addClientAdresse("Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS");
$pdf->addReglement($_SESSION['nama']);
$pdf->addEcheance(tgl_indo(date("Y m d")));
$pdf->addNumTVA($nama."-".$d['no_anggota']);

$pdf->ln(7);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(12, 8, 'NO', 1, 0, 'C');
$pdf->Cell(40, 8, 'Tanggal', 1, 0, 'C');
$pdf->Cell(30, 8, 'Jenis', 1, 0, 'C');
$pdf->Cell(40, 8, 'Debet', 1, 0, 'C');
$pdf->Cell(40, 8, 'Kredit', 1, 0, 'C');
$pdf->Cell(35, 8, 'Saldo', 1, 0, 'C');





 $query = $conn->query("SELECT kd_simpanan as id,tgl,no_anggota,kd_jenis,jumlah,user,'simpanan' as ket,tgl_update FROM tt_simpanan
 		$where
 		UNION
 		SELECT kd_pengambilan as id, tgl,no_anggota,kd_jenis,jumlah,user,'tarik tunai' as ket,tgl_update FROM tt_pengambilan
 		$where
 		order by tgl_update");

$pdf->SetFont('Arial','B',10);
 $no=1;
	$page =1;
	$saldo=0;
	while($r_data=$query->fetch_array()){
	$tgl = tgl_indo($r_data['tgl']);		
	$jenis = cariJenis($r_data['kd_jenis']);
	$ket = $r_data['ket'];

	if($ket=='simpanan'){
		$debet = $r_data['jumlah'];
		$kredit= 0;
	}else{
		$debet=0;
		$kredit = $r_data['jumlah'];
	}
	$saldo = ($saldo+$debet)-$kredit;
	$pdf->ln(8);
	$pdf->Cell(12, 8, $no , 1, 0, 'C');
	$pdf->Cell(40, 8, $tgl , 1, 0, 'C');
	$pdf->Cell(30, 8, $jenis ."[".$r_data['ket']."]" , 1, 0, 'C');
	$pdf->Cell(40, 8, "Rp.".number_format($debet) , 1, 0, 'C');
	$pdf->Cell(40, 8, "Rp.".number_format($kredit) , 1, 0, 'C');
	$pdf->Cell(35, 8, "Rp.".number_format($saldo) , 1, 0, 'C');
	$no++;

//ini buat pengulangan
	}

$pdf->addCadreEurosFrancs();
	//$pdf->addCadreTVAs();



//$y   += $size + 2;


        

//$pdf->addTVAs( $params, $tab_tva, $tot_prods);

$pdf->Output();
?>