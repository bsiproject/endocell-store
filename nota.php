<?php
include ("function/koneksi.php");
session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])){
	echo"<script>alert ('Anda belum login, silahkan login dulu!')
           window.location='index.php';</script>";
}else 
	if(isset($_SESSION['pembeli']['id_pembeli'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="images/title.png">
<title>Gema </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet"> 

<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery.countdown.css" /> <!-- countdown --> 
 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
</head> 
<body>
<div class="container">
	<div class="table-colapse">
		<div class="row">
			<div class="col-md-8">
			<table align="center" border="0">
				<tr>
					<td align="center" colspan="4"><h3>ENDOCELL STORE </h3><p><h3> Nota Pembelian </p><p>Alamat : Jalan Sudirman,Kec.Cerenti, Kabupaten Kuantan Singingi, Riau. </p></h3></td>
					<td colspan="4"> <hr> </td>
				</tr>
				
				<?php
				include "function/koneksi.php";
					$id_pembeli =$_SESSION['pembeli']['id_pembeli'];
					$pilih=mysqli_query($koneksi,"SELECT * FROM tbl_alamat WHERE id_pembeli='$id_pembeli'");
					while($data=$pilih->fetch_array()){
				?>
				<tr>
					<td colspan="4"> Tanggal Pembelian : <b><?php echo $data['tanggal_peng'];?></b></td>
				</tr>
					<?php } ?>
				<tr>
					<td colspan="2"> Nama Pembeli : </td>
					<td><b><?php echo $_SESSION['pembeli']['nama'];?></b><p>
						<b><?php echo $_SESSION['pembeli']['email'];?></b><p>
					</td>
					<td>Telpon : <b><?php echo $_SESSION['pembeli']['telpon'];?></b></td>
				</tr>
				<tr>
					<td colspan=""> Daftar Barang </td>
					<td colspan=""> Jumlah</td>
					<td colspan=""> Harga</td>
					<td colspan=""> Total</td>
				</tr>
				<?php
				include "function/koneksi.php";
					$id_pembeli =$_SESSION['pembeli']['id_pembeli'];
					$pilih=mysqli_query($koneksi,"SELECT * FROM tbl_transaksi a LEFT JOIN tbl_product b ON a.id_barang=b.id_barang WHERE id_pembeli='$id_pembeli'");
					while($data=mysqli_fetch_array($pilih)){ ?>
				<tr>
					<td colspan=""><b> <?php echo $data['nama_barang'];?> </b></td>
					<td colspan=""> 1 </td>
					<td colspan=""><b>Rp. <?php echo number_format($data['harga']);?></b></td>
					<td colspan=""><b>Rp. <?php echo number_format($data['harga']);?></b></td>
				</tr>
				<?php } ?>
				<?php
				include "function/koneksi.php";
					$id_pembeli =$_SESSION['pembeli']['id_pembeli'];
					$pilih=mysqli_query($koneksi,"SELECT * FROM tbl_alamat WHERE id_pembeli='$id_pembeli'");
					while($cek=$pilih->fetch_array()){
				?>
				<tr>
					<td colspan="2" align="right"> Ongkir : </td>
					<td colspan=""><b>Rp. <?php echo number_format($cek['ongkos']);?></b></td>
					<td colspan=""><b>Rp. <?php echo number_format($cek['ongkos']);?></b></td>
					<td
				</tr>
				<tr>
					<td colspan="3" align="center">Subtotal</td>
					<td><b>Rp. <?php echo number_format($cek['total_kes']);?></b></td>
				</tr>
					<?php } ?>
					<hr>
				<tr>
					<td colspan="2" align="center"> Penerima </td>
					<td colspan="2" align="center"> Hormat kami </td>
				</tr>
				<tr>
					<td colspan="2" align="center"> <br><br><br><br> </td>
					<td colspan="2" align="center"> <br><br><br><br> </td>
				</tr>
				<tr>
					<td colspan="2" align="center"><b><u><?php echo $_SESSION['pembeli']['nama'];?></u></b> </td>
					<td colspan="2" align="center"><b><u>ENDOCELL STORE</u></b> </td>
				</tr>
			</table>

			</div>
		</div>
	</div>
</div>
</body>
</html>
	<?php } ?>
		<script>
		window.print();
	</script>