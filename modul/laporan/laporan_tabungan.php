<?php

switch ($_GET['act']) {
	
	default:
		
		# 
		?>
	<table class="table table-striped table-bordered table-hover" id="tabungan">
                               <thead bgcolor="#eeeeee" align="center">
                                  <tr class="warning">
                                    <th>No</th>
                                    <th>Nomor Anggota</th>
                                    <th>Nomor KTP </th>
                                    <th>Nama </th>
                                    
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th class="text-center"> Action </th>

                                    </tr>
                                    </thead>

                                  <tbody>
                                  </tbody>
                              </table>

	<?php	break;
	case "ditel"; ?>

<embed src="modul/laporan/cetak_tabungan.php" type="application/pdf" width="1100px" height="500"/>




	<?php break;
}
?>