<?php
session_start();
if(isset($_SESSION['admin'])) {
    header('location:admin/halaman.php');
}
if(isset($_SESSION['nama'])) {
    header('location:admin/halaman.php');
}
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$userfail = isset($_GET['userfail']);
$passwordfail = isset($_GET['passwordfail']);
$logout = isset($_GET['logout']);
?>
<!DOCTYPE html>
<html lang="zxx">
<!-- Head -->

<head>
<link rel="icon" type="image/png" href="images/title.png">
    <title>Halaman Login</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" >
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
	<!-- Index-Page-CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/waves-effect.css" type="text/css" media="all">
    <!-- //Custom-Stylesheet-Links -->
    <!--fonts -->
    <!-- //fonts -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
    <!-- //Font-Awesome-File-Links -->
	
	<!-- Google fonts -->
	<link href="//fonts.googleapis.com/css?family=Quattrocento+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">
	<!-- Google fonts -->

</head>
<!-- //Head -->
<!-- Body -->

<body>
<div class="panel-body">



<section class="main">
	<div class="layer">
		
		<div class="bottom-grid">
			<div class="logo">
				<h1> <a href="#"><span class="fa fa-desktop"></span> Login</a></h1>
			</div>
		</div>
		<div class="content-w3ls">
			<div class="text-center icon">
				<span class="fa fa-home"></span>
			</div>
			<div class="content-bottom">
				
			<?php
 if ($userfail) {
     echo '<div class="alert alert-warning alert-dismissable">
		<button class="close" data-dismiss="alert">&times;</button>
		<p>Username / Password Salah !</p>
	 </div>';
 } elseif ($passwordfail) {
     echo '<div class="alert alert-warning alert-dismissable">
		<button class="close" data-dismiss="alert">&times;</button>
		<p>Username / Password Salah !</p>
	</div>';
 } elseif ($logout) {
     echo '<div class="alert alert-warning alert-dismissable">
		<button class="close" data-dismiss="alert">&times;</button>
		<p>Anda telah berhasil logout</p>
	</div>';
 }
?>
				<form action="proses_login.php" method="POST" >
					<div class="field-group">
						<span class="fa fa-user" aria-hidden="true"></span>

						<div class="wthree-field">
							<input name="user" type="text" value="" placeholder="Username" required>
						</div>
					</div>
					<div class="field-group">
						<span class="fa fa-lock" aria-hidden="true"></span>
						<div class="wthree-field">
							<input name="pass"  type="Password" placeholder="Password">
						</div>
					</div>		
					<div class="wthree-field">
						<button type="submit" name="login" class="btn btn-warning">LOGIN</button>
					</div>
					<style>
				        /* Gaya untuk hyperlink saat dihover (disorot) */
				        .change-password:hover {
				            color: red; /* Contoh: saat dihover, teks hyperlink akan berubah menjadi warna merah */
				        }
				    </style>
					<center><a href="admin/reset.php" style="color: black; text-decoration: none;" class="change-password">Lupa Username/Password? Ubah Disini!</a></center>
				</form>
			</div>
		</div>
		<div class="bottom-grid1">
			<div class="copyright">
				<p>© 2019 | Design by
					<a href="#">ENDOCELL & AKBEL TA</a>
				</p>
			</div>
		</div>
    </div>
</section>

</body>
<!-- //Body -->
</html>
<pre><?php echo print_r($_SESSION['id_admin']['nama']) ?></pre>