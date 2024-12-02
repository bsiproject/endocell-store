
<?php
session_start();
if (!isset($_SESSION['pembeli']['id_pembeli'])) {
    echo"<script>alert ('Anda belum login, silahkan login dulu!')
           window.location='index.php';</script>";
} elseif(isset($_SESSION['pembeli']['id_pembeli'])) {
    $id = $_SESSION['pembeli']["id_pembeli"];
    ?>
<div class="container">
  <h2>Informasi Pemesanan</h2>
           
  <div class="table-responsive">
    <?php
      $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
    $qry=mysqli_query($koneksi, "SELECT `file`, `nama`, `timestamp`, `nama_file`, `member`, `token` FROM `file` JOIN `pembeli` ON `file`.`member` = `pembeli`.`id_pembeli` WHERE `file`.`status` = 2 AND `file`.`member` = $id");
    ?>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Foto</th> 
          <th>Token</th> 
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>   
        <?php
          $no=1;
    while($data= mysqli_fetch_array($qry)) {
        ?>  
        <tr class="info">
          <td><?php echo $no++ ?> </td>
          <td><?php echo $data['nama'] ?></td>
          <td><?php echo $data['timestamp'] ?></td>
          <td><img width="50px" height="50px" src="./function/admin/product/images1/<?php echo $data['nama_file']; ?>"></td>
          <td><?php echo $data['token'] ?></td>
          <td>
            <div class="form-group" data-member="<?= $data["member"] ?>" data-file="<?= $data["file"] ?>">
              <button style="width: auto; margin-right: 1em" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x deleteInfo"></button>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function(){
      $(".deleteInfo").click(function(){
        var fileID = $(this).closest('div').attr('data-file');

        $.ajax({
          url: "./api.php",
          method: "POST",
          data: {
            action: "deleteInfo",
            fileID: fileID,
          },
          success: function (response) {
            location.reload();
          },
        })
      })
    })
  </script>
	<?php } ?>