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



$pdf->AddPage();
$pdf->addSociete( $data['koperasi'],"Alamat:\n" .$data['alamat']."\n"."Kota :".$data['kota']);
//$pdf->fact_dev( "Buku ", "Tabungan" );
$pdf->temporaire( "No Data Found" );

//$pdf->addClient($nama);
//$pdf->addPageNumber("1");
//$pdf->addClientAdresse("Ste\nM. XXXX\n3ème étage\n33, rue d'ailleurs\n75000 PARIS");
//$pdf->addReglement($_SESSION['nama']);
//$pdf->addEcheance(tgl_indo(date("Y m d")));
//$pdf->addNumTVA($nama."-".$d['no_anggota']);
//$pdf->addReference("Devis ... du ....");


	$pdf->addCadreTVAs();



//$y   += $size + 2;


        

//$pdf->addTVAs( $params, $tab_tva, $tot_prods);
//$pdf->addCadreEurosFrancs();
$pdf->Output();
?>