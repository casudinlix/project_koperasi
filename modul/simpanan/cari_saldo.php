<script type="text/javascript">
$(function() {
	$("#theTable tr:even").addClass("stripe1");
	$("#theTable tr:odd").addClass("stripe2");

	$("#theTable tr").hover(
		function() {
			$(this).toggleClass("highlight");
		},
		function() {
			$(this).toggleClass("highlight");
		}
	);
});
function deleteRow(ID) {
	var id	= ID;
	var cari = $("#nomor").val();
   var pilih = confirm('Data yang akan dihapus  = '+id+ '?');
	if (pilih==true) {
		$.ajax({
			type	: "POST",
			url		: "modul/simpanan/hapus.php",
			data	: "id="+id,
			success	: function(data){
				$("#tampil_data1").load("modul/simpanan/cari_simpanan?cari="+cari);
			}
		});
	}
}
</script>
<?php
 error_reporting(0);
include '../../server/config.php';
include '../../server/tgl.php';
$cari	= $_GET['cari'];
$where	= " WHERE no_anggota='$cari'";
$q=$conn->query("SELECT * FROM m_anggota $where");
$aku=$q->fetch_array();
?>

            <?php
//$sql= "SELECT a.*,b.jenis_simpanan FROM tt_simpanan as a JOIN m_jenis_simpanan as b ON a.kd_jenis=b.kd_jenis $where ORDER BY a.id DESC";
$sql=$conn->query("SELECT * FROM m_jenis_simpanan,tt_simpanan WHERE m_jenis_simpanan.kd_jenis=tt_simpanan.kd_jenis AND  no_anggota='$cari' ORDER BY kd_simpanan");

	$no=1;
	if ($sql->num_rows> 0) {
		//echo "Tidak Ada Data Simpanan";

	while($rows=$sql->fetch_array()){

	$gtotal = $gtotal+$rows['jumlah'];
	}

}
