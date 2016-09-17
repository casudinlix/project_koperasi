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

<section class="panel">
  <header class="panel-heading">
                  </header>
     <div class="panel-body">
   <div class="form">
   <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">

 <div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Kode Jenis <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="kode" value="<?php echo $kd;?>" readonly /> </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Nama Pinjaman <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="nama" v /> </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Lama Angsuran<span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="lama" /> </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Maksimal Pinjaman <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="max" /> </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Tanggal <span class="required">*</span></label>
<div class="col-lg-10"><input class="form-control " id="cemail" type="teks" name="kode" value="<?php echo $date;?>" readonly /> </div>
</div>                            
<div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
       <input type="submit" name="submit" class="btn-info" value="Save"></button>
         <button class="btn btn-default" type="reset">Reset</button>
<?php break;

case 'edit':
?>

edit

<?php break;
case 'delete':?>
Delete
<?php	break;?>
<?php }
?>