<?php 
include 'koneksi.php';
$id = $_GET['id'];
mysql_query("DELETE FROM Data WHERE id='$id'")or die(mysql_error());

header("location:index.php?pesan=hapus");
?>