<?php
switch ($_GET['act']) {

  default:
    ?>
    <a href="?page=jenis-simpanan&act=tambah"><i class="fa fa-plus-circle fa-2x" title="Tambah"></i>Tambah</a> &nbsp;&nbsp;

  <div class="panel panel-default">

  <div class="panel-heading">
                        <div class="table-responsive">

<table class="table table-striped table-bordered table-hover" id="jenis">
 <thead bgcolor="#eeeeee" align="center">
  <tr>
   <th>No</th>

   <th>Nama Jenis</th>
   <th>Jumlah Setor Minimal</th>
 <th class="text-center"> Action </th>

   </tr>
   </thead>

    <tr>
 <?php
    $no=1;
  $r=$conn->query("SELECT * FROM m_jenis_simpanan");
  while ($data=$r->fetch_array()) {

?>
<td>
   <?php echo $no ?>
   </td>
  <td>
  <?php echo $data['nama_jenis']; ?>
</td>
  <td>
<?php echo $data['min_setoran']; ?>
    </td>
  <?php $no++;
} ?>
  </tr>
  </tbody>
  </table>
    <div class="pull-right">

                          </div>
                              </div>
                          </div>

                      </div>




    <?php
    break;
    case "tambah";
    ?>
    Tambah
    <?php break;
    case "edit";
    ?>
edit

<?php    break ;
    case "delete";
    ?>
    Delete
<?php } ?>
