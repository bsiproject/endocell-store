<?php
$koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
$id = $_GET['id'];
$qry=mysqli_query($koneksi, "SELECT * FROM tbl_alamat WHERE id_alamat='$id'");
?>
<div class="container">
  <h2>Edit Data Product</h2>
  <form action="./transaksi/simpan_edit.php" method="POST" enctype="multipart/form-data">
   <?php while ($data = mysqli_fetch_array($qry)) { ?>
 <div class="form-group ">
		<input type="hidden" name="id_alamat" value="<?php echo $data['id_alamat'] ?>">
        <label class="control-label"> Status</label>
        <select name="status" class="form-control1">
            <?php
            $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
       $qry = mysqli_query($koneksi, " SELECT * FROM status");
       while ($data = mysqli_fetch_array($qry)) { ?>
               <option name="status" value="<?= $data['status']?>" ><?= $data['status']?>  </option>
            <?php } ?>
        </select>
    </div>
    <input type="submit" name="edit" value="Proses" class="btn btn-warning">
   <?php } ?>
</form>
</div>