<?php
 switch ($_GET['act']) {
                              
  default:

  ?>

<a href="?page=jenis-pinjaman&act=tambah"><i class="fa fa-plus-circle fa-2x" title="Tambah"></i>Tambah</a> &nbsp;&nbsp;
                              
  <div class="panel panel-default">
    <div class="panel-heading">
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="jenis">
   <thead bgcolor ="#eeeeee" align="center">
    <tr>
  <th>No</th>
 <th>Kode Pinjaman</th>
   <th>Nama pinjaman</th>
   <th>Lama Angsuran</th>
   <th>Maksimal Pinjaman</th>
   <th>Tanggal Input</th>
     <th class ="text-center"> Action </th>
 </tr>
 </thead>
                              
  <tr>
  <?php
   $no  =1;
    $r =$conn->query("SELECT * FROM m_jenis_pinjaman");
  while ($data   =$r->fetch_array()) {
                              
  ?>
  <td>
 <?php echo $no ?>
  </td>
   <td colspan="" rowspan="" headers=""><?php echo $data['kd_pinjaman'];?></td>
    <td>
    <?php echo $data['nama_pinjaman']; ?>
      </td>
     <td>
       <?php echo $data['lama_angsuran']; ?> Bulan
    </td>
    <td colspan="" rowspan="" headers="">Rp.<?php echo number_format($data['max_pinjaman']); ?>,-</td>
    <td colspan="" rowspan="" headers=""><?php echo tgl_indo($data['tgl'])?></td>
   <td colspan="" rowspan="" headers="">
   <a href="?page=jenis-pinjaman&act=edit&kd=<?php echo $data['kd_pinjaman'];?> "<i class='fa fa-pencil fa-lg' title='Edit'></i>Edit</a> 
   <a href="?page=jenis-pinjaman&act=delete&kd=<?php echo $data['kd_pinjaman'];?>" onclick="javascript:return confirm('Anda yakin?')"><i class='fa fa-trash fa-lg' title='DELETE'></i>Hapus</a></td>
                              
                              </tr>
                              <?php $no++;
                              } ?>
                              </tbody>
                              </table>
                              <div class     ="pull-right">
                              
                              </div>
                              </div>
                              </div>
                              
                              </div>
  <?php
		
		break;
		case "tambah";
		include 'fungsi_pinjaman.php';
		?>


  <header class="panel-heading">
                  </header>
     <div class="panel-body">
   <div class="form">
   <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">

 <div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Kode Simpanan <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="kode" value="<?php echo $kd;?>" readonly /> </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Nama Pinjaman <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="nama" v /> </div>
</div>
<div class="form-group ">
   <label for="curl" class="control-label col-lg-2">Lama Pinjaman</label>
    <div class="col-lg-10">

<select class="form-control select2" style="width: 100%;" name="lama">
                   <option>-Pilih-</option>
                   <option value="3">3 Bulan</option>
                   <option value="6">6 Bulan</option>
                   <option value="12">12 Bulan</option>
                   
                 </select>
                 </div>
                 </div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Maksimal Pinjaman <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="max" placeholder="Rp"/> </div>
</div>
       
<div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
       <input type="submit" name="submit" class="btn-info" value="Save"></button>
         <button class="btn btn-default" type="reset">Reset</button>

<?php
if (isset($_POST['submit'])) {
	$kd =$_POST['kode'];
	$nama =$_POST['nama'];
	$lama=$_POST['lama'];
	$max=$_POST['max'];
	$insert =$conn->query("INSERT INTO m_jenis_pinjaman(kd_pinjaman,nama_pinjaman,lama_angsuran,max_pinjaman,tgl)VALUES('$kd','$nama','$lama','$max',NOW())");
	if ($insert==FALSE) {
		die($conn->error);
	}else{
		echo "<script>
  alert('Success');
  window.location.href = 'media.php?page=jenis-pinjaman';
  </script>";
	}
}

?>
<?php break;

case 'edit':
$kd=$_GET['kd'];
$q = $conn->query("SELECT * FROM m_jenis_pinjaman WHERE kd_pinjaman='$kd'");
$d=$q->fetch_array();
?>


  <header class="panel-heading">
                  </header>
     <div class="panel-body">
   <div class="form">
   <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">

 <div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Kode Simpanan <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="kode" value="<?php echo $d['kd_pinjaman'];?>" readonly /> </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Nama Pinjaman <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="nama" value="<?php echo $d['nama_pinjaman']?>" /> </div>
</div>
<div class="form-group ">
   <label for="curl" class="control-label col-lg-2">Lama Pinjaman</label>
    <div class="col-lg-10">

<select class="form-control select2" style="width: 100%;" name="lama">
                   <option value="<?php echo $d['lama_angsuran']?>"><?php echo $d['lama_angsuran']?> Bulan</option>
                   <option value="3">3 Bulan</option>
                   <option value="6">6 Bulan</option>
                   <option value="12">12 Bulan</option>
                   
                 </select>
                 </div>
                 </div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Maksimal Pinjaman <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="max" value="<?php echo $d['max_pinjaman']?>"/> </div>
</div>
       
<div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
       <input type="submit" name="submit" class="btn-info" value="Update">

       <?php
if (isset($_POST['submit'])) {

	$nama=$_POST['nama'];
	$lama=$_POST['lama'];
	$max =$_POST['max'];

$update =$conn->query("UPDATE m_jenis_pinjaman SET nama_pinjaman='$nama',lama_angsuran='$lama', max_pinjaman='$max' WHERE kd_pinjaman='$kd'");
      if ($update==FALSE) {
           die($conn->error);
      }else{
echo "<script>
  alert('Success Update');
  window.location.href = 'media.php?page=jenis-pinjaman';
  </script>";
      }
}
       ?>

<?php break;
case 'delete';

$kd=$_GET['kd'];                         
$update =$conn->query("DELETE FROM m_jenis_pinjaman WHERE kd_pinjaman='$kd'");
      if ($update==FALSE) {
           die($conn->error);
      }else{
echo "<script>
  alert('Success');
  window.location.href = 'media.php?page=jenis-pinjaman';
  </script>";}

?>

<?php	break;?>
<?php }
?>