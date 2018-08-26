<?php
$host = 'localhost'; 
$username = 'root'; 
$password = '';
$database = 'telkom';

// Koneksi ke MySQL dengan PDO
$pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>
