<?php
// memulai session
//error_reporting(0);
include 'server/config.php';
session_start();
  $user=$_POST['user'];
  $pass=md5($_POST['pass']);
  $cari = $conn->query("SELECT * FROM login WHERE username='$user' AND pass='$pass'");
  $row = $cari->fetch_array();
  if ($cari->num_rows > 0) {
    $_SESSION['id']=$row['id'];
    $_SESSION['nama']=$row['nama'];

    $_SESSION['foto']=$row['foto'];
    echo "<script>window.location.assign('media.php?page=home')</script>";
}else{
  echo "<script>
  alert('Password Anda Tidak Sama');
  window.location.href = 'index.php';
  </script>";
}



 ?>
