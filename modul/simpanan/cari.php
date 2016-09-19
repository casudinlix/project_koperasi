<?php
include "../../server/config.php";
$table  = 'm_anggota';
$id = $_POST['cari'];

$sql=$conn->query("SELECT * FROM m_anggota WHERE no_anggota='$id'");
//$sql=$conn->query("SELECT * FROM m_jenis_simpanan,tt_simpanan,m_anggota WHERE m_jenis_simpanan.kd_simpanan=no_anggota.kd_jenis no_anggota.m_anggota=no_anggota.kd_jenis AND no_anggota='$id'");
$row  = $sql->num_rows;
if ($row>0){
  $r=$sql->fetch_array();
  
  ?>
  <div class="box-body">
                <div class="form-group">

                  <label for="" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" placeholder="" readonly="true" value="<?php echo $r['nama_anggota']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control " id="" name="alamat" readonly="true"><?php echo $r['alamat']?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    
                    </div>
                  </div>
                </div>
              </div>

<?php }
    ?>

