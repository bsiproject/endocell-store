<?php

include("function/koneksi.php");
if(isset($_POST['simpan'])) {
    $email =$_POST['email'];
    $password =$_POST['password'];
    $ambil=$koneksi->query("SELECT * FROM pembeli WHERE email='$email' AND password='$password' ");

    $cek=$ambil->num_rows;

    if($cek ==1) {
        session_start();
        $akun=$ambil->fetch_assoc();
        $_SESSION['pembeli']= $akun;
        echo"<script>alert ('Anda Berhasi Login')
       window.location='index.php';</script>";
    } else {
        echo"<script>alert ('Anda Gagal Login,Periksa akun anda')
           window.location='index.php';</script>";
    }
}
