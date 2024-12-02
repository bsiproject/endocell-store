<?php

$koneksi=new mysqli('localhost', 'root', '', 'db_sparepart');
if(isset($_POST['login'])) {
    $user =$_POST['user'];
    $pass =$_POST['pass'];
    $ambil=$koneksi->query("SELECT * FROM admin WHERE user='$user' AND pass='$pass' ");

    $cek=$ambil->num_rows;

    if($cek ==1) {
        session_start();
        $akun=$ambil->fetch_assoc();
        $_SESSION['admin']= $akun;
        echo"<script>alert ('Anda Berhasi Login')
       window.location='index.php';</script>";
    } else {
        echo"<script>alert ('Anda Gagal Login,Periksa akun anda')
           window.location='index.php';</script>";
    }
}
