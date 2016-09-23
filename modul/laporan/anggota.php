<?php
switch ($_GET['act']) {

  default:

  ?>

<a href="?page=anggota&act=tambah"><i class="fa fa-plus-circle fa-2x" title="Tambah"></i>Tambah</a> &nbsp;&nbsp;<a href=""><i class="fa fa-file-pdf-o fa-2x" title="Download Surat Pendaftaran Anggota"></i>Download Surat Pendaftaran Anggota</a>
                    <div class="panel panel-default">

                  <div class="panel-heading">

                    <div class="table-responsive">

                  <table class="table table-striped table-bordered table-hover" id="anggota">
                               <thead bgcolor="#eeeeee" align="center">
                                  <tr>
                                    <th>No</th>
                                    <th>Nomor Anggota</th>
                                    <th>Nomor KTP </th>
                                    <th>Nama </th>
                                    <th>Kelamin</th>
                                    <th>Telphone</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th class="text-center"> Action </th>

                                    </tr>
                                    </thead>

                                  <tbody>
                                  </tbody>
                              </table>
                              <div class="pull-right">

                      </div>
                          </div>
                      </div>

                  </div>
  <?php
    break;
    case "edit";
?>
edit


<?php
break;
case "delete";
?>
delete

<?php break;
case "tambah";
include "modul/anggota/fungsi.php";

?>

<section class="panel">
                         <header class="panel-heading">
                             Form Tambah Anggota
                         </header>
                         <div class="panel-body">
                             <div class="form">
   <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
  <div class="form-group ">
 <label for="cname" class="control-label col-lg-2">Nomor Anggota <span class="required">*</span></label>
 <div class="col-lg-10">
   <input class="form-control" id="cname" name="no" minlength="5" type="text" readonly="" value="<?php echo $kd?>" />
 </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">No KTP <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" onkeypress="return angka()" name="ktp" required /> </div>
  </div>
 <div class="form-group ">
 <label for="curl" class="control-label col-lg-2">Nama Lengkap</label>
  <div class="col-lg-10">
   <input class="form-control " id="curl" type="teks" name="nama" />
  </div>
   </div>

   <div class="form-group ">
   <label for="curl" class="control-label col-lg-2">Kelamin</label>
    <div class="col-lg-10">

<select class="form-control select2" style="width: 100%;" name="jk">
                   <option>-Pilih-</option>
                   <option value="Laki-Laki">Laki-Laki</option>
                   <option value="Perempuan">Perempuan</option>

                 </select>
    </div>
     </div>

     <div class="form-group ">
     <label for="curl" class="control-label col-lg-2">Telphone</label>
      <div class="col-lg-10">
       <input class="form-control " id="curl" type="teks" name="tlp" />
      </div>
       </div>
       <div class="form-group ">
       <label for="curl" class="control-label col-lg-2">Tempat Lahir</label>
        <div class="col-lg-10">
         <input class="form-control " id="curl" type="teks" name="tempat" required=""/>
        </div>
         </div>
         <div class="form-group ">
         <label for="curl" class="control-label col-lg-2">Tanggal Lahir</label>
          <div class="col-lg-10">
            <div class="input-group date">
                   <div class="input-group-addon">
                     <i class="fa fa-calendar"></i>
                   </div>

                   <input type="teks" class="form-control pull-right" id="datepicker" name='ttl'>
                 </div>


        </div></div>
                                     <div class="form-group ">
                                         <label for="ccomment" class="control-label col-lg-2">Alamat</label>
                                         <div class="col-lg-10">
                                             <textarea class="form-control " id="ccomment" name="alamat" required></textarea>
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
$date =date('Y-m-d',strtotime($_POST['ttl']));
$no =$_POST['no'];
$ktp=$_POST['ktp'];
$nama =$_POST['nama'];
$jk =$_POST['jk'];
$tlp =$_POST['tlp'];
$tempat=$_POST['tempat'];
//$ttl =$_POST['ttl'];
$alamat =$_POST['alamat'];

$insert =$conn->query("INSERT INTO m_anggota(no_anggota,no_ktp,nama_anggota,jk,tlp,tempat_lahir,ttl,alamat,
status)VALUES('$no','$ktp','$nama','$jk','$tlp','$tempat','$date','$alamat','Aktiv')");
if($insert==FALSE){
die($conn->error);
}else{
  echo "<script>
  alert('Anggota Berhasil Di Tambahkan');
  window.location.href = 'media.php?page=anggota';
  </script>";
}
}
break;
case "detail";?>

detail
<?php }
 ?>
