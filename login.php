<?php
include("function/koneksi.php");
?>
<?php
$user = $_POST['user'];
$pass = $_POST['pass'];
$login = $_POST['login'];

if ('login') {
    if ($user == "" || $pass == "") {
        echo "<script>alert('Username atau Password Salah');</script>";
    } else {
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_member WHERE username='$user' AND password='$pass' ");
		$data = mysqli_num_rows($query);
		$hasil = mysqli_fetch_array($query);

        if ($cek >= 1) {
			header('location:index1.php?userfail');
		} else {
			if ( $pass <> $hasil['password'] ) {
		header('location:index1.php?passwordfail');
			} else {
				$_SESSION['username'] = $user;
				header('location:index.php');
			}
		}
	}
}
?>