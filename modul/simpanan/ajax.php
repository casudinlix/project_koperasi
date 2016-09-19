<?php

if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    require 'ssp.class.php';

    // nama table
    $table = 'm_anggota';

    // Table's primary key
    $primaryKey = 'no_anggota';

    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes

		$columns = array(
        array('db' => 'no_anggota', 'dt' => 'no_anggota'),
				array('db' => 'no_ktp', 'dt' => 'no_ktp'),
				array('db' => 'nama_anggota', 'dt' => 'nama_anggota'),
				array('db' => 'jk', 'dt' => 'jk'),
				array('db' => 'tlp', 'dt' => 'tlp'),
				array('db' => 'tempat_lahir', 'dt' => 'tempat_lahir'),
				array('db' => 'ttl', 'dt' => 'ttl'),
				array('db' => 'alamat', 'dt' => 'alamat'),
				array('db' => 'status', 'dt' => 'status')
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
