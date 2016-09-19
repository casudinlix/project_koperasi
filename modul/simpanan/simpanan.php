<?php
switch ($_GET['act']) {
  
  default:
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
                <div class="form-group">
                  <label for="exampleInputEmail1">No anggota</label>
                  <input type="teks" class="form-control" id="" placeholder="Enter No Anggota">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Simpan</label>
                  <input type="text" class="form-control" id="" placeholder="" value="<?php echo tgl_indo(date("Y m d"));?>" readonly>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jenis Simpanan</label>
                <select class="form-control select2" style="width: 100%;" name="jenis">
                <?php $q =$conn->query("SELECT * FROM m_jenis_simpanan"); ?>
                  <option selected="selected">Pilih</option>
                  <?php 
                  while ($data=$q->fetch_array()) {
                      
                  
                     ?>
                  <option value="<?php echo $data['kd_simpanan'];?>"><?php echo $data['nama_jenis'];?></option>
                 <?php
               }
                 ?>
                </select>
               
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Simpanan</label>
                  <input type="text" class="form-control" id="" placeholder="">
                </div>
                
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
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
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="" placeholder="" readonly="true">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control " id="" name="alamat" readonly="true"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              
            </form>
          </div>
          <!-- /.box -->
          <!-- general form elements disabled -->
         
            <!-- /.box-header -->
           
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

}
?>