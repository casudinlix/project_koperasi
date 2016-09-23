<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF
include "../../server/config.php";
include "../../server/tgl.php";
require('../../pdf/invoice.php');
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


$judul_H = "CETAK REKENING ANGGOTA<br>";
$judul_H .= "NOMOR. $kode<br>";
$judul_H .= "$nama<br>";
}

$pdf->AddPage();
$pdf->addSociete( $data['koperasi'],"Alamat:\n" .$data['alamat']."\n"."Kota :".$data['kota']);
//$pdf->fact_dev( "Buku ", "Tabungan" );
$pdf->temporaire( "Rumah Kreasi" );

//$pdf->addClient($nama);
//$pdf->addPageNumber("1");
//$pdf->addClientAdresse("Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS");
$pdf->addReglement($_SESSION['nama']);
$pdf->addEcheance(tgl_indo(date("Y m d")));
$pdf->addNumTVA($nama."-".$d['no_anggota']);
$pdf->addReference("Devis ... du ....");
$cols=array( "Tanggal"    => 23,
             "Jenis"  => 78,
             "Debit"     => 22,
             "Kredit"      => 26,
             "Saldo" => 30
              );
$pdf->addCols( $cols);
$cols=array( "Tanggal"    => "L",
             "Jenis"  => "L",
             "Debit"     => "C",
             "Kredit"      => "R",
             "Saldo" => "R"
             );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

 $query = $conn->query("SELECT kd_simpanan as id,tgl,no_anggota,kd_jenis,jumlah,user,'simpan' as ket,tgl_update FROM tt_simpanan
 		$where
 		UNION
 		SELECT kd_pengambilan as id, tgl,no_anggota,kd_jenis,jumlah,user,'tarik tunai' as ket,tgl_update FROM tt_pengambilan
 		$where
 		order by tgl_update");

$line = array( "Tanggal"    => $data['tgl'],
               "Jenis"  => "Carte Mère MSI 6378\n" .
                                 "Processeur AMD 1Ghz\n" .
                                 "128Mo SDRAM, 30 Go Disque, CD-ROM, Floppy, Carte vidéo",
               "Debit"     => "1",
               "Kredit"      => "600.00",
               "Saldo." => "600.00",
               ""          => "1" );
 $no=1;
	$page =1;
	$saldo=0;
	while($r_data=$query->fetch_array()){
	$tgl = tgl_indo($r_data['tgl']);		
	$jenis = $r_data['kd_jenis'];
	$ket = $r_data['ket'];
	if($ket=='simpan'){
		$debet = $r_data['jumlah'];
		$kredit= 0;
	}else{
		$debet=0;
		$kredit = $r_data['jumlah'];
	}
	$saldo = ($saldo+$debet)-$kredit;
	//$total = $r_data[hargabeli]*$r_data[jmlbeli];
	//$gtotal = $gtotal+$total;
	if(($no%40) == 1){
   	if($no > 1){
       
		$page++;
  	}
   	
	}
	



	$no++;
	}


	


//$size = $pdf->addLine( $y, $line );
//$y   += $size + 2;

$pdf->addCadreTVAs();
        

//$pdf->addTVAs( $params, $tab_tva, $tot_prods);
//$pdf->addCadreEurosFrancs();
$pdf->Output();
?>