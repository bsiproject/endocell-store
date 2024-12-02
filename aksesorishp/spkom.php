<div class="top-brands">
		<div class="container">
			<h3>Sparepart Komputer</h3>
			<div class="sliderfig">
				</div>
				</div>
				</div>

<div class="banner-bottom">
		<div class="container">

		<?php
        //connection
        $koneksi = new mysqli('localhost', 'root', '', 'db_sparepart');

		$pilih = "SELECT * FROM tbl_product a LEFT JOIN tbl_kategori b ON a.id_kategori=b.id_kategori WHERE a.id_kategori='6'";
		$query = $koneksi->query($pilih);
		while($data = $query->fetch_assoc()) {
		    ?>
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row product_image">
							<img src="function/admin/product/images1/<?php echo $data['foto'] ?>" width="240px" height="260">
						</div>
						<div class="row product_name">
							<h4><a href="index.php?page=detail&id=<?php echo $data['id_barang'];?>" value=""><?php echo $data['nama_barang']; ?></a></h4>
							<p class="pull-left"><b>Rp.<?php echo number_format($data['harga']); ?></b></p><br>
							<p value="STOK :"><b> Stok :<?php echo $data['jumlah']?></b></p>
						</div>
						<div class="row product_footer">
							
							<span class="pull-right"><a href="add_cart.php?id=<?php echo $data['id_barang']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Beli</a></span>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		?>
		</div></div>