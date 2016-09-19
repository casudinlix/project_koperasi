
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 0.1
    </div>
    <strong>Copyright &copy;2016 <a href="https://www.facebook.com/rumahkreasi777/" target="_blank">Rumah Kreasi</a>.</strong> All rights
    reserved.
  </footer>



<!-- jQuery 2.2.3 -->
<script src="<?php echo $url;?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $url;?>bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo $url;?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $url;?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url;?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url;?>dist/js/demo.js"></script>
<script src="<?php echo $url;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>


<script src="<?php echo $url;?>js/jquery.dataTables.js"></script>
<script src="<?php echo $url;?>js/dataTables.bootstrap.js"></script>
<script src="<?php echo $url;?>plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
    $(document).ready(function () {
        var t = $('#anggota').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": 'modul/anggota/ajax.php',

            "order": [[2, 'asc']],
            "columns": [
              {"data": null,
         "width": "30px",
         "sClass": "text-center",
         "orderable": true,
      },
                {"data": "no_anggota"},
                {"data": "no_ktp"},
                {"data": "nama_anggota"},
                {"data": "jk"},
                {"data": "tlp"},
                {"data": "tempat_lahir"},
                {"data": "ttl"},
                {"data": "alamat"},
                {"data": "status"},
                {"data": "no_anggota",
                "width": "100px",
                "sClass": "text-center",
                "orderable": false,"mRender": function (data) {
return '<a href="?page=anggota&act=detail&id='+ data +'" ><i class=\'fa fa-eye fa-lg\' title=\'Detail\'></i></a>\n\<a href="?page=anggota&act=edit&id='+ data +'" ><i class=\'fa fa-edit fa-lg\' title=\'EDIT\'></i></a> \n\<a href="?page=anggota&act=delete&id='+ data +'" onclick="javascript:return confirm(\'Anda yakin?\');"><i class=\'fa fa-trash fa-lg\' title=\'DELETE\'></i></a>';
  }
  }
              ],

              });
              t.on( 'order.dt search.dt', function () {
                    t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                        cell.innerHTML = i+1;
                    } );
                } ).draw();
            } );
            $('#datepicker').datepicker({
      autoclose: true
    });

</script>

