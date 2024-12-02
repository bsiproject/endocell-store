<!-- Head Title -->
<div class="top-brands" style="padding: 5em 0px 0px 1em">
	<div class="container">
		<h3>Handphone</h3>
	</div>
</div>

<!-- Categories -->
<div class="row" style="padding-bottom: 2em">
	<div class="col-lg-12">
		<div class="special-menu text-center">
			<div class="button-group filter-button-group">
				<button class="btn cat-phone btn-primary" id="phoneAll">All</button>
				<button class="btn cat-phone btn-secondary" id="phoneOppo">Oppo</button>
				<button class="btn cat-phone btn-secondary" id="phoneVivo">Vivo</button>
				<button class="btn cat-phone btn-secondary" id="phoneInfinix">Infinix</button>
				<button class="btn cat-phone btn-secondary" id="phoneRealme">Realme</button>
			</div>
		</div>
	</div>
</div>
<div class="banner-bottom">
	<div class="container" id="wrapperPhone"></div>
</div>

<script>
$(document).ready(function() {
	// Default Phone Category
	$.ajax({
		url: 'api.php',
		method: 'POST',
		data: {
			action: 'getAllPhone',
		},
		success: function(res){
			var jsonData = JSON.parse(res);
			console.log(jsonData);

			$("#wrapperPhone").empty()

			$.each(jsonData, function(index, val){
				$("#wrapperPhone").append(`
					<div class="col-sm-3">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row product_image">
									<img src="function/admin/product/images1/${val.foto}" width="240px" height="260">
								</div>
								<div class="row product_name">
									<h4><a href="index.php?page=detail&id=${val.id_barang}" value="">${val.nama_barang}</a></h4>
									<p class="pull-left"><b>Rp.${parseFloat(val.harga).toLocaleString(window.document.documentElement.lang)}</b></p><br>
									<p value="STOK :"><b> Stok : ${val.jumlah}</b></p>
								</div>
								<div class="row product_footer">
									<span class="pull-right"><a href="add_cart.php?id=${val.id_barang}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Beli</a></span>
								</div>
							</div>
						</div>
					</div>
				`);
			})
		}
	})






	// Phone Category
  $('.cat-phone').click(function() {
    $('.cat-phone').removeClass('btn-primary').addClass('btn-secondary')
    
    // Menambahkan class btn-primary pada button yang diklik
    $(this).addClass('btn-primary').removeClass('btn-secondary')

	var phoneId = $(this).attr("id");
	if(phoneId == "phoneAll"){
		$.ajax({
			url: 'api.php',
			method: 'POST',
			data: {
				action: 'getAllPhone',
			},
			success: function(res){
				var jsonData = JSON.parse(res);
				console.log(jsonData);

				$("#wrapperPhone").empty()

				$.each(jsonData, function(index, val){
					$("#wrapperPhone").append(`
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row product_image">
										<img src="function/admin/product/images1/${val.foto}" width="240px" height="260">
									</div>
									<div class="row product_name">
										<h4><a href="index.php?page=detail&id=${val.id_barang}" value="">${val.nama_barang}</a></h4>
										<p class="pull-left"><b>Rp.${parseFloat(val.harga).toLocaleString(window.document.documentElement.lang)}</b></p><br>
										<p value="STOK :"><b> Stok : ${val.jumlah}</b></p>
									</div>
									<div class="row product_footer">
										<span class="pull-right"><a href="add_cart.php?id=${val.id_barang}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Beli</a></span>
									</div>
								</div>
							</div>
						</div>
					`);
				})
			}
		})
	} else {
		var phoneCode;

		if (phoneId == "phoneOppo") {
			phoneCode = 1;
		} else if (phoneId == "phoneVivo") {
			phoneCode = 2;
		} else if (phoneId == "phoneInfinix") {
			phoneCode = 3;
		} else if (phoneId == "phoneRealme") {
			phoneCode = 4;
		}
		$.ajax({
			url: 'api.php',
			method: 'POST',
			data: {
				action: 'getPhoneByBrand',
				phoneCode: phoneCode,
			},
			success: function(res){
				var jsonData = JSON.parse(res);

				$("#wrapperPhone").empty()

				$.each(jsonData, function(index, val){
					$("#wrapperPhone").append(`
						<div class="col-sm-3">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row product_image">
										<img src="function/admin/product/images1/${val.foto}" width="240px" height="260">
									</div>
									<div class="row product_name">
										<h4><a href="index.php?page=detail&id=${val.id_barang}" value="">${val.nama_barang}</a></h4>
										<p class="pull-left"><b>Rp.${parseFloat(val.harga).toLocaleString(window.document.documentElement.lang)}</b></p><br>
										<p value="STOK :"><b> Stok : ${val.jumlah}</b></p>
									</div>
									<div class="row product_footer">
										<span class="pull-right"><a href="add_cart.php?id=${val.id_barang}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Beli</a></span>
									</div>
								</div>
							</div>
						</div>
					`);
				})
			}
		})
	}
  });
});

</script>