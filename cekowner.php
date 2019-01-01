<?php
session_start();
// cek apakah user sudah login (Login Sebagai Owner!)

if(!isset($_SESSION['username'])){
    die("Anda Belum Login");

}
// Cek Level User
if($_SESSION['level']!="Owner"){
    die("Anda Bukan Owner");

}
?>