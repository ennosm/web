<?php 
session_start();

date_default_timezone_set("Asia/Jakarta");
define('namaweb', 'ADMIN');


$host = "localhost";
$username = "root";
$password ="081122";
$dbname ="beritaku";

//Membuat Koneksi
$koneksi = new mysqli($host, $username, $password, $dbname);

//Memeriksa Koneksi
$koneksi = new mysqli($host, $username, $password, $dbname);

?>