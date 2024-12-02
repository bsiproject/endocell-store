<?php
	$asal = $_POST['asal'];
	$id_kabupaten = $_POST['kab_id'];
	$kurir = $_POST['kurir'];
	$berat = $_POST['berat'];

	$curl = curl_init();
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
	  CURLOPT_HTTPHEADER => array(
	    "content-type: application/x-www-form-urlencoded",
	    "key:1e0e9609e7c82e2d7f3c0d2833a0d112"
	  ),
	));
	$response = curl_exec($curl);
	$err = curl_error($curl);
	curl_close($curl);
	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $data = json_decode($response, true);
	}
	//echo $response;
	?>
	<?php echo $data['rajaongkir']['origin_details']['city_name'];?> ke <?php echo $data['rajaongkir']['destination_details']['city_name'];?> Berat<?php echo $berat;?>Kg Kurir : <?php echo strtoupper($kurir); ?>
	<?php
	 for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
	?>
	<div class"row">
		 <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" >
			 <table class="table table-striped col-md-4">
				 <tr>
					 <th>No.</th>
					 <th>Jenis Layanan</th>
					 <th>Proses Pengiriman</th>
					 <th colspan="2">Tarif</th>
				 </tr>
				 <?php
				 //echo count($data['rajaongkir']['results'][$k]);
				 for ($l=0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
				 ?>
				 <tr>
					 <td><?php echo $l+1;?></td>
					 <td calss="col-md-3 ">
						 <div style="font:bold 16px Arial"><input class="form-control" type="text" name="ongkos" readonly="readonly" value="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?>"> </div>
					 </td>
					 <td calss="col-md-3"><input class="form-control" type="text" name="ongkos" readonly="readonly" value="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> Hari"></td>
					 <td calss="col-md-3" width="50%"><input class="form-control" type="text" name="ongkos" readonly="readonly" value="Rp.<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];?>"/></td>
					 <td>
						<a href="" class="btn btn-primary" type="suubmit">Pilih</a>
					 </td>
				 </tr>
				 <?php
				 }
				 ?>
			 </table>
		 </div>
		</div>
		</div>
	 <?php
	 }
	 ?>
