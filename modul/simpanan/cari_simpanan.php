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
<div class="box-header with-border">
              <h3 class="box-title">Riwayat Simpanan Atas Nama <?php echo $aku['nama_anggota'];?></h3>
            </div>
           
 
 <div class="box-body no-padding">
              <table class="table">


            <tr class="danger">
				<th colspan="" rowspan="" headers="" scope="">No</th>
            	<th colspan="" rowspan="" headers="" scope="">Kode Simpanan</th>
            	<th colspan="" rowspan="" headers="" scope="">Tanggal Simpan</th>
            	<th colspan="" rowspan="" headers="" scope="">Nomor Anggota</th>
            	<th colspan="" rowspan="" headers="" scope="">Jenis Simpanan</th>
            	<th colspan="" rowspan="" headers="" scope="">Jumlah</th>
            	<th colspan="" rowspan="" headers="" scope="">Petugas</th>

            </tr>
</div>
            <?php
//$sql= "SELECT a.*,b.jenis_simpanan FROM tt_simpanan as a JOIN m_jenis_simpanan as b ON a.kd_jenis=b.kd_jenis $where ORDER BY a.id DESC";
$sql=$conn->query("SELECT * FROM m_jenis_simpanan,tt_simpanan WHERE m_jenis_simpanan.kd_jenis=tt_simpanan.kd_jenis AND  no_anggota='$cari' ORDER BY kd_simpanan");
	
	$no=1;
	if ($sql->num_rows==0) {
		//echo "Tidak Ada Data Simpanan";
		echo "<div>
  <img src='$url/img/load.gif'>Loading
</div>";
	}else{
	while($rows=$sql->fetch_array()){
		?>
<tr class="info">

<td colspan="" rowspan="" headers=""><?php echo $no?></td>
	<td colspan="" rowspan="" headers=""><?php echo $rows['kd_simpanan'];?></td>
<td colspan="" rowspan="" headers=""><?php echo tgl_indo($rows['tgl']);?></td>
<td colspan="" rowspan="" headers=""><?php echo $rows['no_anggota'];?></td>
<td colspan="" rowspan="" headers=""><?php echo $rows['nama_jenis'];?></td>
<td colspan="" rowspan="" headers="">Rp.<?php echo number_format($rows['jumlah']);?></td>
<td colspan="" rowspan="" headers=""><?php echo $rows['user'];?></td>

</tr>
</div>
<?php
	$no++;
	$gtotal = $gtotal+$rows['jumlah'];
	}

echo "
	<tr>
		<td colspan='3' align='center' class='warning'>Total Saldo</td><td class='warning'></td><td class='warning'></td>
		<td align='right'  class='warning'><i class='fa fa-money'</i>Rp.<b>".number_format($gtotal).",-,</b></td></td><td class='warning'></td>
		
	</tr> </table> </div>";
}
         