<?php
session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])) {
    echo"<script>alert ('Anda belum login, silahkan login dulu!')
			window.location='index.php';</script>";
} elseif(isset($_SESSION['pembeli']['id_pembeli'])) {
    if($total==0 || $total=='') {
        echo`<script>alert("silahkan belanja terlebih dahulu!");
				window.location='index.php';
				</script>`;
    }
    ?>
<br/>
<style>
	.preview-image {
		width: 200px;
		height: auto;
		margin-top: 10px;
	}

	.copy-text {
		position: relative;
		padding: 10px;
		background: #fff;
		border: 1px solid #ddd;
		border-radius: 10px;
		display: flex;
		justify-content: space-between;
		margin-left: 20px;
	}
	.copy-text input.text {
		padding: 10px;
		font-size: 18px;
		color: #555;
		border: none;
		outline: none;
	}
	.copy-text button {
		padding: 10px;
		background: #5784f5;
		color: #fff;
		font-size: 18px;
		border: none;
		outline: none;
		border-radius: 10px;
		cursor: pointer;
	}

	.copy-text button:active {
		background: #809ce2;
	}
	.copy-text button:before {
		content: "Copied";
		position: absolute;
		top: -45px;
		right: 0px;
		background: #5c81dc;
		padding: 8px 10px;
		border-radius: 20px;
		font-size: 15px;
		display: none;
	}
	.copy-text button:after {
		content: "";
		position: absolute;
		top: -20px;
		right: 25px;
		width: 10px;
		height: 10px;
		background: #5c81dc;
		transform: rotate(45deg);
		display: none;
	}
	.copy-text.active button:before,
	.copy-text.active button:after {
		display: block;
	}

	.copy-wrapper {
		display: flex;
    	align-items: center;
		margin-bottom: 20px;
	}
</style>
<div class="container">
	<div class="row">
		<form method="POST" action="cekcek.php" enctype="multypart/form-data">
			<div class="col-md-12">
				<div class="panel-heading">
					<h3 class="panel-title">Data Pembelian</h3>
				</div>
				<table class="table">
					<thead>
						<th>Foto</th>
						<th>Nama</th>
						<th>Jumlah</th>
						<th>Tanggal Pembelian</th>
						<th>Subtotal</th>
					</thead>
					<tbody>
					<?php
                        include "function/koneksi.php";
    $id_pembeli=$_SESSION['pembeli']['id_pembeli'];
    // $tampil=$koneksi->query("SELECT * FROM pembelian_barang a LEFT JOIN tbl_product b ON a.id_barang = b.id_barang WHERE id_pembeli='$id_pembeli' ");
    $tampil=$koneksi->query("SELECT c.*, 
									b.`foto` AS 'barang_foto',
									b.`nama_barang` AS 'barang_nama', 
									b.`harga` AS 'barang_harga',
									p.`foto` AS 'pulsa_foto',
									p.`nama_operator` AS 'pulsa_operator',
									p.`isi_pulsa` AS 'pulsa_isi',
									p.`hargapulsa` AS 'pulsa_harga'
								FROM `cart` AS c
								LEFT JOIN `tbl_product` AS b 
									ON c.`id_barang` = b.`id_barang`
								LEFT JOIN `tbl_pulsa` AS p 
									ON c.`id_pulsa` = p.`id_pulsa`
								WHERE (c.`id_barang` IS NOT NULL 
									AND c.`id_pembeli` = $id_pembeli)
								OR (c.`id_pulsa` > 0 
									AND c.`id_pembeli` = $id_pembeli)
                                AND p.id_kategori != 13");
    $no=1;?>
								
						<div class="form-group">
								<?php
                    while($data=$tampil->fetch_array()) {
                        $checkoutFoto = is_null($data['barang_foto']) ? $data['pulsa_foto'] : $data['barang_foto'];
                        $checkoutId = is_null($data['id_barang']) ? $data['id_pulsa'] : $data['id_barang'];
                        $checkoutName = is_null($data['barang_nama']) ? $data['pulsa_operator'] : $data['barang_nama'];
                        $checkoutPrice = is_null($data['barang_harga']) ? $data['pulsa_harga'] : $data['barang_harga'];
                        ?>
							<tr>
								<td width="3%"><img src="function/admin/product/images1/<?= $checkoutFoto ?>" width="70px"></td>
								<td width="8%">
								<input class="form-control" type="hidden" name="idbrg" readonly="readonly" value="<?= $checkoutId  ?>">
								<input class="form-control" type="hidden" name="" readonly="readonly" value="<?= $checkoutName ?>"><?= $checkoutName ?>
								</td>
								<td width="1%"><input class="form-control" type="hidden" readonly="readonly" name="jumlah" value="1">1</td>
								<td width="6%"><input class="form-control" type="hidden" name="" readonly="readonly" value="<?= $data['tanggal'];?>"><?= $data['tanggal'];?></td>
								<td width="10%"><input class="form-control" type="hidden" name="" readonly="readonly" value="Rp.<?= number_format($checkoutPrice) ?>">Rp.<?= number_format($checkoutPrice) ?></td>
								<?php $total += 1*$checkoutPrice;?>
							</tr>
								<?php } ?>
							<tr>
								<td colspan="4">TOTAL BELANJA</td>
								<td><input class="form-control" type="hidden" name="total" readonly="readonly" value="Rp.<?php echo number_format($total) ?>">Rp.<?php echo number_format($total) ?></td>
							</tr>
							<tr>
								<td colspan="5"><input type="hidden" name="belanja" id="" value="<?php echo $total; ?>" class="form-control"><input type="hidden" name="ongkos" id="ongkos" value="0" class="form-control"><input type="hidden" name="prov" id="prov" class="form-control"></td>
							</tr>
						</div>
					</tbody>
				</table>


				<?php
                    include "function/koneksi.php";
    $id_pembeli=$_SESSION['pembeli']['id_pembeli'];
    $tampil=$koneksi->query("SELECT c.*, 
									p.`foto` AS 'pulsa_foto',
									p.`nama_operator` AS 'pulsa_operator',
									p.`isi_pulsa` AS 'pulsa_isi',
									p.`hargapulsa` AS 'pulsa_harga'
								FROM `cart` AS c
								LEFT JOIN `tbl_pulsa` AS p 
									ON c.`id_pulsa` = p.`id_pulsa`
								WHERE (c.`id_pulsa` > 0 
									AND c.`id_pembeli` = $id_pembeli)
                                AND p.id_kategori = 13;");
    $no=1;
    $jumlahPulsaListrik = mysqli_num_rows($tampil);

    // If user buy Pulsa Listrik
    if($jumlahPulsaListrik > 0) {
        ?>
		<!-- Dibayar Terpisah (Pulsa Listrik) -->
		<div class="panel-heading">
			<h3 class="panel-title">Data Pembelian Dibayar Di Awal</h3>
		</div>
		<table class="table">
			<thead>
				<th>Foto</th>
				<th>Nama</th>
				<th>Jumlah</th>
				<th>Tanggal Pembelian</th>
				<th>Subtotal</th>
			</thead>
			<tbody>								
				<div class="form-group">
						<?php
    while($data=$tampil->fetch_array()) {
        $checkoutFoto = is_null($data['barang_foto']) ? $data['pulsa_foto'] : $data['barang_foto'];
        $checkoutId = is_null($data['id_barang']) ? $data['id_pulsa'] : $data['id_barang'];
        $checkoutName = is_null($data['barang_nama']) ? $data['pulsa_operator'] : $data['barang_nama'];
        $checkoutPrice = is_null($data['barang_harga']) ? $data['pulsa_harga'] : $data['barang_harga'];
        ?>
					<tr>
						<td width="3%"><img src="function/admin/product/images1/<?= $checkoutFoto ?>" width="70px"></td>
						<td width="8%">
						<input class="form-control" type="hidden" name="idbrg" readonly="readonly" value="<?= $checkoutId  ?>">
						<input class="form-control" type="hidden" name="" readonly="readonly" value="<?= $checkoutName ?>"><?= $checkoutName ?>
						</td>
						<td width="1%"><input class="form-control" type="hidden" readonly="readonly" name="jumlah" value="1">1</td>
						<td width="6%"><input class="form-control" type="hidden" name="" readonly="readonly" value="<?= $data['tanggal'];?>"><?= $data['tanggal'];?></td>
						<td width="10%"><input class="form-control" type="hidden" name="" readonly="readonly" value="Rp.<?= number_format($checkoutPrice) ?>">Rp.<?= number_format($checkoutPrice) ?></td>
						<?php $totalTerpisah += 1*$checkoutPrice;?>
					</tr>
						<?php } ?>
					<tr>
						<td colspan="4">TOTAL BELANJA</td>
						<td><input class="form-control" type="hidden" name="total" readonly="readonly" value="Rp.<?php echo number_format($totalTerpisah) ?>">Rp.<?php echo number_format($totalTerpisah) ?></td>
					</tr>
					<tr>
						<td colspan="5"><input type="hidden" name="belanja" id="" value="<?php echo $totalTerpisah; ?>" class="form-control"><input type="hidden" name="ongkos" id="ongkos" value="0" class="form-control"><input type="hidden" name="prov" id="prov" class="form-control"></td>
					</tr>
				</div>
			</tbody>
		</table>
	<?php
    } else {
        echo "";
    }
    ?>
					</div>
					<div class="col-md-6">
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Data Pemesan</h3>
							</div>
							<div class="form-group">
							<label>Nama</label>
						<input class="form-control" type="hidden" name="id_pembelian" readonly value="<?php echo $_SESSION['pembeli']['id_pembeli'];?>">
						<input class="form-control" type="text" name="nama" readonly value="<?php echo $_SESSION['pembeli']['nama'];?>">
					</div>
					<div class="form-group">
						<label>No telpon </label>
						<input class="form-control" type="text" name="telpon" readonly value="<?php echo $_SESSION['pembeli']['telpon'];?>">
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3 class="panel-title">Hasil</h3>
						</div>
						<div class="panel-body">
							<ol>
								<div id="ongkir"></div>
						</div>
							</ol>
						</div>
						<?php
                            $isDisabled = "disabled";

    if($jumlahPulsaListrik > 0) {
        ?>
						<div id="pulsaListrik">
							<div class="copy-wrapper">
								<label for="">OVO : </label>
								<div class="copy-text">
									<input type="text" class="text" id="textCopied" <?= $isDisabled ?> value="08xxx" />
									<button><i class="fa fa-clone"></i></button>
								</div>
							</div>	
							<div class="form-group">
								<label for="">Upload Bukti Pembayaran</label>
								<input type="file" accept="image/*" name="image-upload" id="image-upload">
  								<div id="image-preview"></div>
							</div>
						</div>
					<input class="btn btn-success  col-md-12" value="Checkout" type="submit" id="submitButton" name="simpan">	
	<?php
    } else {
        ?>
			<input class="btn btn-success  col-md-12" value="Checkout" type="submit" id="submitButto" name="simpan">	
		<?php
    }
    ?>
		
				</div>
			</div>
			<!-- <?php include("rajaongkir.php"); ?> -->
			<!-- Cek Ongkir -->
			<div class="col-md-6">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">Cek Ongkos Kirim</h3>
					</div>
				<div> 
				<div class='form-group  col-md-12'>
					<label for="asal">Kota/Kabupaten Asal </label>
					<select class="form-control" name='asal' id='asal'></select>
				</div>
				<div class= 'form-group  col-md-12'>
					<label for='provinsi'>Provinsi Tujuan </label>
					<select class='form-control' name='provinsi' id='provinsi'></select>
				</div>
				<div class="form-group  col-md-12">
					<label for="kabupaten">Kota/Kabupaten Tujuan</label><br>
					<select class="form-control" id="kabupaten" name="kabupaten"></select>
				</div>
				<div class="form-group col-md-12">
					<label for="kodepos">Kode Pos *</label>
					<input type="text" name="kodepos" id="kodepos" class="form-control" onkeypress="return hanyaAngka(event)" required>
				</div>
				<div class="form-group  col-md-12">
					<label for="kurir">Kurir</label><br>
					<select class="form-control" id="kurir" name="kurir">
						<option value="jne">JNE</option>
						<option value="tiki">TIKI</option>
						<option value="pos">POS INDONESIA</option>
					</select>
				</div>
				<div class="form-group  col-md-12">
					<label for="berat">Berat (kg)</label><br>
					<?php
            include "function/koneksi.php";
    $id_pembeli=$_SESSION['pembeli']['id_pembeli'];

    // $tampil=$koneksi->query("SELECT * FROM pembelian_barang a LEFT JOIN tbl_product b ON a.id_barang = b.id_barang WHERE id_pembeli= $id_pembeli ");
    $tampil=$koneksi->query("SELECT c.*, 
								b.`foto` AS 'barang_foto',
								b.`nama_barang` AS 'barang_nama', 
								b.`harga` AS 'barang_harga',
								b.`berat` AS 'barang_berat',
								p.`foto` AS 'pulsa_foto',
								p.`nama_operator` AS 'pulsa_operator',
								p.`isi_pulsa` AS 'pulsa_isi',
								p.`hargapulsa` AS 'pulsa_harga'
							FROM `cart` AS c
							LEFT JOIN `tbl_product` AS b 
								ON c.`id_barang` = b.`id_barang`
							LEFT JOIN `tbl_pulsa` AS p 
								ON c.`id_pulsa` = p.`id_pulsa`
							WHERE (c.`id_barang` IS NOT NULL 
								AND c.`id_pembeli` = 3)
							OR (c.`id_pulsa` > 0 
								AND c.`id_pembeli` = 3);");
    while($data=$tampil->fetch_array()) {
        $productWeight = is_null($data['barang_berat']) ? 0 : $data['barang_berat'];
        $kalku += 1 * $productWeight;
    } ?>
					<input class="form-control" id="berat" type="text" name="berat" readonly="readonly" value="<?php echo $kalku; ?>" />
				</div>
				<button class="btn btn-success  col-md-12" id="cek" type="button" name="button">Cek Ongkir</button>
				<tr></tr>
			</div>
		</div>
	</div>
	<br>
		</form>			
	</div>
</div>

<?php include("aksi_script.php"); ?>
<script src="script.js"></script>
</body>
</html>
					<?php } ?>
<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))

		return false;
		return true;
	}
</script>
<script>
$(document).ready(function () {
	// Get City
  $.ajax({
    url: "api.php",
    method: "POST",
    data: {
      action: "getCity",
    },
    success: function (response) {
      var jsonData = JSON.parse(response);

	  $("#asal, #kabupaten").empty()

	  $.each(jsonData.rajaongkir.results, function(index, item){
		$("#asal, #kabupaten").append(`
			<option value='${item.city_id}'>${item.city_name}</option>
		`);
	  })

		//   Get Province
		$.ajax({
			url: "api.php",
			method: "POST",
			data: {
			action: "getProvince",
			},
			success: function (response) {
				var jsonData = JSON.parse(response);

				$("#provinsi").empty()
				
				$.each(jsonData.rajaongkir.results, function(index, item){
					$("#provinsi").append(`
						<option value='${item.province_id}'>${item.province}</option>
					`);
				})
			},
		});
    },
  });

  $('#submitButton').prop("disabled", true);

//   Image Uploader
  $('#image-upload').change(function() {
	var file = this.files[0];
	var isUpload = $(this).prop("files")[0];

	var reader = new FileReader();

	reader.onload = function(e) {
		var image = $('<img>').attr('src', e.target.result).addClass('preview-image');
		$('#image-preview').html(image);
	};

	reader.readAsDataURL(file);

	if (isUpload) {
		$('#submitButton').prop("disabled", false);
	} else {
		$('#submitButton').prop("disabled", true);
	}
 });


//  Save Image
 $('#image-upload').change(function() {
    var file = this.files[0];
	var idPembeli = <?= $id_pembeli ?>;
    var formData = new FormData();
    formData.append('file', file);

    $.ajax({
      url: 'simpan_file.php',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      success: function(response) {

		// Save Image into DB
		$.ajax({
			url: 'api.php',
			method: "POST",
			data: {
				action: "saveFile",
				fileName: file.name,
				idPembeli: idPembeli,
			},
			success: function (response) {
				console.log(response)
			},
		});
		
      },
      error: function(xhr, status, error) {
        console.error('Error:', error);
      }
    });
  });
 });

let copyText = $(".copy-text");
$(".copy-text button").on("click", function () {
	var textToCopy = $("#textCopied").val();
        
	// Membuat elemen input tersembunyi
	var tempInput = $("<input>");
	$("body").append(tempInput);
	tempInput.val(textToCopy).select();
	document.execCommand("copy");
	tempInput.remove();

	copyText.addClass("active");
	setTimeout(function () {
		copyText.removeClass("active");
	}, 2500);
});

</script>