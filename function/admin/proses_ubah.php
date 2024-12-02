<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['new_username']) && isset($_POST['new_password'])) {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    // Lakukan proses validasi atau pengecekan data sesuai kebutuhan
    // Misalnya, cek apakah username dan password lama sesuai dengan data di database sebelum mengubahnya
    // Jika validasi berhasil, maka lakukan proses perubahan data

    // Contoh validasi sederhana untuk tujuan demonstrasi saja
    // Anda harus menyesuaikan validasi sesuai dengan kebutuhan aplikasi
    if ($username == "username_lama" && $password == "password_lama") {
        // Update data ke database
        $query = mysqli_query($koneksi, "UPDATE tabel_pengguna SET username='$new_username', password='$new_password' WHERE username='$username'");

        if ($query) {
            // Jika proses update berhasil
            echo "<script>alert('Data berhasil diubah.');
                  window.location='halaman.php';
                  </script>";
        } else {
            // Jika proses update gagal
            echo "<script>alert('Gagal mengubah data!');
                  window.location='reset.php';
                  </script>";
        }
    } else {
        // Jika validasi tidak sesuai
        echo "<script>alert('Username atau password lama tidak sesuai.');
              window.location='reset.php';
              </script>";
    }
} else {
    // Jika data dari form tidak lengkap atau tidak ditemukan
    echo "<script>alert('Data tidak lengkap.');
          window.location='reset.php';
          </script>";
}
