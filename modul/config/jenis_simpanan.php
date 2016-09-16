                              <?php
                              switch ($_GET['act']) {
                              
                              default:
                              ?>
                              <a href        ="?page=jenis-simpanan&act=tambah"><i class="fa fa-plus-circle fa-2x" title="Tambah"></i>Tambah</a> &nbsp;&nbsp;
                              
                              <div class     ="panel panel-default">
                              
                              <div class     ="panel-heading">
                              <div class     ="table-responsive">
                              
                              <table class   ="table table-striped table-bordered table-hover" id="jenis">
                              <thead bgcolor ="#eeeeee" align="center">
                              <tr>
                              <th>No</th>
                              
                              <th>Nama Jenis</th>
                              <th>Jumlah Setor Minimal</th>
                              <th class      ="text-center"> Action </th>
                              
                              </tr>
                              </thead>
                              
                              <tr>
                              <?php
                              $no            =1;
                              $r             =$conn->query("SELECT * FROM m_jenis_simpanan");
                              while ($data   =$r->fetch_array()) {
                              
                              ?>
                              <td>
                              <?php echo $no ?>
                              </td>
                              <td>
                              <?php echo $data['nama_jenis']; ?>
                              </td>
                              <td>Rp.
                              <?php echo number_format($data['min_setoran']); ?>,-
                              </td>
   <td colspan="" rowspan="" headers="">
   <a href="?page=jenis-simpanan&act=edit&kd=<?php echo $data['id'];?> "<i class='fa fa-pencil fa-lg' title='Edit'></i>Edit</a> 
   <a href="?page=jenis-simpanan&act=delete&kd=<?php echo $data['id']; ?>" onclick="javascript:return confirm('Anda yakin?')"><i class='fa fa-trash fa-lg' title='DELETE'></i>Hapus</a></td>
                              
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
                              ?>
 <section class="panel">
  <header class="panel-heading">
                  </header>
                             <div class="panel-body">
                             <div class="form">
   <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
 
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Nama Jenis <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" onkeypress="return angka()" name="nama" required /> </div>
  </div>
 <div class="form-group ">
 <label for="curl" class="control-label col-lg-2">Minimal Setoran</label>
  <div class="col-lg-10">
   <input class="form-control " id="curl" type="teks" name="min" />
  </div>
   </div>

     <div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
       <input type="submit" name="submit" class="btn-info" value="Save"></button>
         <button class="btn btn-default" type="reset">Reset</button>
                                         </div>
                                     </div>
                                 </form>
                             </div>

                         </div>
                     </section>
                 </div>
             </div>
<?php
if (isset($_POST['submit'])) {
      $nama=$_POST['nama'];
      $min=$_POST['min'];

$insert=$conn->query("INSERT INTO m_jenis_simpanan(nama_jenis,min_setoran)VALUES('$nama','$min')");
      if($insert==FALSE){
die($conn->error);
}else{
  echo "<script>
  alert('Data Berhasil Di Tambahkan');
  window.location.href = 'media.php?page=jenis-simpanan';
  </script>";
}


}?>
<?php break;
  case "edit";
?>
<?php 
$kd=$_GET['kd'];

$s = $conn->query("SELECT * FROM m_jenis_simpanan WHERE id='$kd'");
$tampil = $s->fetch_array();
?>
 <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
 
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Nama Jenis <span class="required">*</span></label>
<div class="col-lg-10">
<input class="form-control " id="cemail" type="teks"  name="nama" value="<?php echo $tampil['nama_jenis'];?>" required /> </div>
  </div>
 <div class="form-group ">
 <label for="curl" class="control-label col-lg-2">Minimal Setoran</label>
  <div class="col-lg-10">
   <input class="form-control " id="curl" type="teks" name="min" value="<?php echo number_format($tampil['min_setoran']);?>"/>
  </div>
   </div>

     <div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
       <input type="submit" name="submit" class="btn-info" value="Update">
                              

</div>
</div>
</form>
<?php
if (isset($_POST['submit'])) {
      $nama =$_POST['nama'];
      $min = $_POST['min'];

      $update =$conn->query("UPDATE m_jenis_simpanan SET nama_jenis='$nama',min_setoran='$min' WHERE id='$kd'");
      if ($update==FALSE) {
           die($conn->error);
      }else{
echo "<script>
  alert('Data Berhasil Di Update');
  window.location.href = 'media.php?page=jenis-simpanan';
  </script>";
      }
}
?>

                              <?php    break ;
                              case "delete";
     $kd=$_GET['kd'];                         
$update =$conn->query("DELETE FROM m_jenis_simpanan WHERE id='$kd'");
      if ($update==FALSE) {
           die($conn->error);
      }else{
echo "<script>
  alert('Data Berhasil Di Hapus');
  window.location.href = 'media.php?page=jenis-simpanan';
  </script>";}
                              ?>
                              
                              <?php } ?>
