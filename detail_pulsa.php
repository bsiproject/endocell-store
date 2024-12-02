<br><br>

<br>
<div class="container">
        <div class="about-grids">
            <?php
            include("function/koneksi.php");
            $pilih = mysqli_query($koneksi, "SELECT * FROM tbl_pulsa WHERE id_pulsa='$_GET[id]'");
            while ($data = mysqli_fetch_array($pilih)) {
                ?>
                <div class="col-md-5 wthree-about-left">
                    <div class="wthree-about-left-info">
                        <img src="images/<?php echo $data['foto']; ?>" alt="Gagal Load Gambar" width="350" height="420" />
                    </div>
                </div>
                <div class="col-md-7 agileits-about-right">
                    <h2><?php echo $data['nama_operator']; ?></h2><br><br>
                    <a><h2>Rp.<?php echo number_format($data['hargapulsa']); ?></h2> <br> 
					<br><p value="STOK :"><b><h4> Stok :<?php echo $data['kategori']?> Pcs</h4></b></p></a>
					<br><br>
                    <p><h3><?php echo $data['ket']; ?></h3></p>
					<span class="pull-right"><a href="add_cartpulsa.php?id=<?php echo $data['id_pulsa']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Beli</a></span>
                </div>
                <div class="clearfix"> </div>
            <?php } ?>
        </div>
    </div>