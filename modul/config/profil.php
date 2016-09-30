<?php

switch ($_GET['act']) {
	
	default:
	$r=$conn->query("SELECT * FROM profil");
	$d=$r->fetch_array();
	    
	
?>

		
		<section class="panel">
                         <header class="panel-heading">
                             Profil Koperasi
                         </header>
                         <div class="panel-body">
                             <div class="form">
   <form class="form-validate form-horizontal" id="feedback_form" method="post" action="">
  <div class="form-group ">
 <label for="cname" class="control-label col-lg-2">Nama Koperasi <span class="required">*</span></label>
 <div class="col-lg-10">
   <input class="form-control" id="cname" name="nama" minlength="5" type="text"  value="<?php echo $d['koperasi'];?>" />
 </div>
</div>
<div class="form-group ">
<label for="cemail" class="control-label col-lg-2">Alamat <span class="required">*</span></label>
<div class="col-lg-10">
<input class="form-control " id="cemail" type="teks"  name="alamat" required value="<?php echo $d['alamat'];?>"  />
 </div>
  </div>
 <div class="form-group ">
 <label for="curl" class="control-label col-lg-2">Kota</label>
  <div class="col-lg-10">
   <input class="form-control " id="curl" type="teks" name="kota" value="<?php echo $d['kota'];?>" />
  </div>
   </div>

   

     <div class="form-group ">
     <label for="curl" class="control-label col-lg-2">Telphone</label>
      <div class="col-lg-10">
       <input class="form-control " id="curl" type="teks" name="tlp" value="<?php echo $d['tlp'];?>" />
      </div>
       </div>
       <div class="form-group ">
       <label for="curl" class="control-label col-lg-2">Fax</label>
        <div class="col-lg-10">
         <input class="form-control " id="curl" type="teks" name="fax" required="" value="<?php echo $d['fax'];?>"/>
        </div>
         </div>
         <div class="form-group ">
         <label for="curl" class="control-label col-lg-2">Email</label>
         
          <div class="col-lg-10">
         <input class="form-control " id="curl" type="email" name="email" required="" value="<?php echo $d['email'];?>"/>
        </div>
         
     <div class="form-group">
  <div class="col-lg-offset-2 col-lg-10">
       <input type="submit" name="submit" class="btn-info" value="Save"></button>
        
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
	$nama =$_POST['nama'];
	
	$alamat =$_POST['alamat'];
	$kota = $_POST['kota'];
	$tlp=$_POST['tlp'];
	$fax=$_POST['fax'];
	$email = $_POST['email'];

	$insert =$conn->query("UPDATE profil SET koperasi='$nama',alamat='$alamat',kota='$kota',tlp='$tlp',fax='$fax',email='$email' WHERE id='1'");
	if ($insert==FALSE) {
		die($conn->error);
	}
	echo "<script>
  alert('Success);
  window.location.href = 'media.php?page=profil';
  </script>";
}
		break;
		case 'edit': ?>
			# code...
			


			<?php
			break;
			case 'update':
				# code...
				break;
}

?>