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
	    "key: 1e0e9609e7c82e2d7f3c0d2833a0d112"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "cURL Error #:" . $err;
	} else {
	  $data = json_decode($response, TRUE);


if(!empty($data['rajaongkir']['results'])){
	$i=0;
	 foreach ($data['rajaongkir']['results'][0]['costs'] as $row){
		$i+=1;
			$tarif=$row['cost'][0]['value'];
			$service=$row['service'];
			$deskripsi=$row['description'];
			$waktu=$row['cost'][0]['etd']?$row['cost'][0]['etd']:"-";
 		?>
		<div class="form-group col-lg-4">
			<div class="" style='margin: 0px;'>
				<label>
					<input type="radio" name="service" class="service" data-id="<?php echo $i; ?>" value="<?php echo $service; ?>"/> <?php echo $deskripsi; ?>
				</label>
			</div>
			<input type="hidden" name="tarif" id="tarif<?php echo $i; ?>" value="<?php echo $tarif; ?>"/>
			<p style='margin-left: 19px;'>
				Tarif <b>Rp <?php echo number_format($tarif,0); ?></b><br/>
				Estimasi sampai <b><?php echo $waktu; ?> hari</b>
			</p>
		</div>

<?php
			}
}else{
	echo "Paket Tidak Tersedia";
}
}

?>
<script>
	$(document).ready(function(){
		$(".service").each(function(o_index,o_val){
	  	$(this).on("change",function(){
	  		var did=$(this).attr('data-id');
	  		var tarif=$("#tarif"+did).val();
			var ong = document.getElementById('ongkos').value=tarif;
			console.log(ong)
	  		// $("#ongkir").val(tarif);
	  		// hitung();
	  	});
	  });

		function hitung(){
	    var total=$('#total').val();
	    var ongkir=$("#ongkir").val();
	    var bayar=(parseFloat(total)+parseFloat(ongkir));
	    if(parseFloat(ongkir) > 0){
	        $("#oksimpan").show();
	    }else{
	        $("#oksimpan").hide();
	    }
	    $("#totalbayar").val(bayar);
			$("#testotal").html(toDuit(bayar));
			$("#jmlongkir").html(toDuit(ongkir));
			$("#biayap").show();
			$("#jmlongkir").show();
	 }

	 function toDuit(number) {
			 var number = number.toString(),
			 duit = number.split('.')[0],
			 duit = duit.split('').reverse().join('')
					 .replace(/(\d{3}(?!$))/g, '$1,')
					 .split('').reverse().join('');
			 return 'Rp. ' + duit ;
	 }

	});
</script>
