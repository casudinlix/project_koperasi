<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    require 'ssp.class.php';

    // nama table
    $table = 'tabel_transaksi';

    // Table's primary key
    $primaryKey = 'id_transaksi';

    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes

		$columns = array(
        array('db' => 'id_transaksi', 'dt' => 'id_transaksi'),
				array('db' => 'kode_transaksi', 'dt' => 'kode_transaksi'),
                array('db' => 'kode_rekening', 'dt' => 'kode_rekening'),
				array('db' => 'tanggal_transaksi', 'dt' => 'tanggal_transaksi'),
				array('db' => 'jenis_transaksi', 'dt' => 'jenis_transaksi'),
				array('db' => 'keterangan_transaksi', 'dt' => 'keterangan_transaksi'),
				array('db' => 'debet', 'dt' => 'debet'),
				array('db' => 'kredit', 'dt' => 'kredit'),
				//array('db' => 'tanggal_posting', 'dt' => 'tanggal_posting'),
				//array('db' => 'status', 'dt' => 'status')
			);

    // SQL server connection information
    $sql_details = array(
        'user' => 'root',
        'pass' => 'bintang',
        'db' => 'project_koperasi',
        'host' => 'localhost'
    );


    echo json_encode(
            SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
    );

} else {
    echo '<script>window.location="404.html"</script>';
}
?>
