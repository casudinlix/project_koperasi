<?php
switch ($_GET['act']) {

  default:
  include "fungsi.php"
   ?>


<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-save"></i>Transaksi Simpanan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
            <div class="box-body">
                <div class="form-group ui-helper-clearfix">
                  <label for="exampleInputEmail1">No Transaksi</label>
                  <input type="teks" class="form-control" id="" name="notrans" placeholder="Enter No Anggota" onkeyup="this.value = this.value.toUpperCase()" value="<?php echo $kd?>" readonly>
                </div>

                <div class="form-group ui-helper-clearfix">
                  <label for="exampleInputEmail1">No anggota</label>
                  <input type="teks" class="form-control" id="no" name="no" placeholder="Enter No Anggota" onkeyup="this.value = this.value.toUpperCase()" autocomplete="off">
                </div>
                <div class="form-group">
                <input type="hidden" name="update" value="<?php echo date('Y-m-d H:i:s');?>" placeholder="">
                  <label for="exampleInputPassword1">Tanggal Simpan</label>
                  <input type="text" class="form-control" name="" placeholder="<?php echo tgl_indo(date("Y m d"));?>"  readonly>
                  <input type="hidden" name="tgl" value="<?php echo date("Y-m-d");?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Simpanan</label>
                <select class="form-control select2" style="width: 100%;" name="jenis">
                <?php $q =$conn->query("SELECT * FROM m_jenis_simpanan"); ?>
                  <option>Pilih</option>
                  <?php
                  while ($data=$q->fetch_array()) {


                     ?>
                  <option value="<?php echo $data['kd_jenis'];?>"><?php echo $data['nama_jenis'];?></option>
                 <?php
               }
                 ?>
                </select>

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Simpanan</label>
                  <input type="text" class="form-control" id="" placeholder="" name="jumlah">
                </div>

                <input type="hidden" name="user" value="<?php echo $_SESSION['nama'];?>" placeholder="">
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <input type="submit" name="submit" value="Save" class="btn-warning">
              </div>
            </form>
            <?php
if (isset($_POST['submit'])) {
  $not=$_POST['notras'];
  $no=$_POST['no'];
  strtotime($tgl=$_POST['tgl']);
  $jenis =$_POST['jenis'];
  $jml=$_POST['jumlah'];
  $usr=$_POST['user'];
  $update=$_POST['update'];
$insert = $conn->query("INSERT INTO tt_simpanan (kd_simpanan,tgl,no_anggota,kd_jenis,jumlah,tgl_update,user)
  VALUES('$kd','$tgl','$no','$jenis','$jml','$update','$usr')");
if ($insert==FALSE) {
  die($conn->error);
}else{
   echo "<script>
  alert('Success');
  window.location.href = 'media.php?page=transaksi-simpanan';
  </script>";
}
}
?>
          </div>
          <!-- /.box -->




        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Info Anggota</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="info_anggota">

              <!-- /.box-body -->

            </form>
            <div id="saldo"> </div>
          </div>
        <div class="box-body no-padding">
            <div id="tampil_simpanan">

            </div>

          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
    </aside>
   <?php
    break;
    case "cari";
?>


    <?php break;

}
?>
