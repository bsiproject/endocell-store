<div class="col-md-6">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">Cek Ongkos Kirim</h3>
		</div>
		<div> <?php
        //Get Data Kabupaten
        $curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_URL => "http://api.rajaongkir.com/starter/city",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		        "key:1e0e9609e7c82e2d7f3c0d2833a0d112"
		    ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		echo "
			<div class='form-group  col-md-12'>
			<label for=\"asal\">Kota/Kabupaten Asal </label>
			<select class=\"form-control\" name='asal' id='asal' >";
		echo "<option>Pilih Kota Asal</option>";
		$data = json_decode($response, true);
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		    echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
		}
		echo "</select>
			</div>";
		//Get Data Kabupaten
		//-----------------------------------------------------------------------------

		//Get Data Provinsi
		$curl = curl_init();

		curl_setopt_array($curl, array(
		    CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_ENCODING => "",
		    CURLOPT_MAXREDIRS => 10,
		    CURLOPT_TIMEOUT => 30,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_CUSTOMREQUEST => "GET",
		    CURLOPT_HTTPHEADER => array(
		    "key:1e0e9609e7c82e2d7f3c0d2833a0d112"
		    ),
		    ));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		echo "
				<div class= 'form-group  col-md-12'>
					<label for='provinsi'>Provinsi Tujuan </label>
					<select class='form-control' name='provinsi' id='provinsi' onchange='prov()'>";
		echo "<option>Pilih Provinsi Tujuan</option>";
		$data = json_decode($response, true);
		for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		    echo "<option value='".$data['rajaongkir']['results'][$i]['province_id']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
		}
		echo "</select>
					</div>";
		//Get Data Provinsi
		?>

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
		    ?>
				<?php $kalku += 1 * $productWeight?>		
<?php } ?>
<input class="form-control" id="berat" type="text" name="berat" readonly="readonly" value="<?php echo $kalku; ?>" />
					</div>
					<button class="btn btn-success  col-md-12" id="cek" type="button" name="button">Cek Ongkir</button>
					<tr>
		</tr>
				</div>
		
	</div>
</div>