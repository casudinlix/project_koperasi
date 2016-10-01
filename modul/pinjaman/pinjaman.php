<?php
switch ($_GET['act']) {

  default:
  include "fungsi.php";

   ?>


<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-save"></i>Transaksi Pinjaman</h3>
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
                  <input type="teks" class="form-control" id="nomor" name="nomor" placeholder="Enter No Anggota"  autocomplete="off">
                </div>
                <div class="form-group">
                <input type="hidden" name="update" value="<?php echo date('Y-m-d H:i:s');?>" placeholder="">
                  <label for="exampleInputPassword1">Tanggal Penarikan</label>
                  <input type="text" class="form-control" name="" placeholder="<?php echo tgl_indo(date("Y m d"));?>"  readonly>
                  <input type="hidden" name="tgl" value="<?php echo date("Y-m-d");?>" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Simpanan</label>
                <select class="form-control select2" style="width: 100%;" name="jenis">
                <?php $q =$conn->query("SELECT * FROM m_jenis_simpanan WHERE nama_jenis='Tabungan'"); ?>

                  <?php
                  $data=$q->fetch_array()


                     ?>
                  <option value="<?php echo $data['kd_jenis'];?>"><?php echo $data['nama_jenis'];?></option>

                </select>

                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Penarikan</label>
                  <input type="text" class="form-control" id="" placeholder="" name="jml">
                  <input type="text" name="xx" id="saldo" value="">
                  <input type="text" value="">
                </div>

                <input type="hidden" name="user" value="<?php echo $_SESSION['nama'];?>">
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
               <input type="submit" name="submit" value="Save" class="btn-warning">
              </div>
            </form>
            <?php
if (isset($_POST['submit'])) {
  $not=$_POST['notras'];
  $jenis =$_POST['jenis'];
  $no=$_POST['nomor'];
   
  $jml=$_POST['jml'];
  strtotime($tgl=$_POST['tgl']);
  $usr=$_POST['user'];
  //keterangan
  $update=$_POST['update'];

  if ($saldo > $jml) {
    echo "<script>
  alert('saldo anda Tidak Mencukupi $saldo');
  window.location.href = 'media.php?page=transaksi-penarikan';
  </script>";
  die();
  }else{
$insert = $conn->query("INSERT INTO tt_pengambilan (kd_pengambilan,kd_jenis,no_anggota,jumlah,tgl,user,keterangan,tgl_update)
  VALUES('$kd','$jenis','$no','$jml','$tgl','$usr','Tarik Tunai','$update')");
   echo "<script>
  alert('Success');
  window.location.href = 'media.php?page=transaksi-penarikan';
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
<div id="saldo">

            </div>
            </form>
            
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
