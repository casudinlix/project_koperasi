<?php
// memulai session
//error_reporting(0);
include 'server/config.php';

  $user=$_POST['user'];
  $pass=md5($_POST['pass']);
  $cari = $conn->query("SELECT * FROM login WHERE username='$user' AND pass='$pass'");
  $row = $cari->fetch_array();
  if ($cari->num_rows > 0) {
    session_start();
    $_SESSION['id']=$row['id'];
    $_SESSION['nama']=$row['username'];
    $_SESSION['nama_kita']=$row['nama_kita'];
    $_SESSION['foto']=$row['foto'];
    $_SESSION['role']=$row['role'];
    echo "<script>window.location.assign('media.php?page=home')</script>";
}else{
  echo "<script>
  alert('Sometink Is Wrong');
  window.location.href = '$url';
  </script>";
}



 ?>
