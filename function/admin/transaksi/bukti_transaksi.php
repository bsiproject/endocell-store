<div class="container">
  <h2>Bukti Transaksi</h2>
  <div class="table-responsive">
    <?php
      $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
    $qry=mysqli_query($koneksi, "SELECT * FROM pembayaran");
    ?>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Bank</th>
          <th>Jumlah</th>
          <th>Tanggal</th>
          <th>Foto</th> 
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
          <td><?php echo $data['bank'] ?></td>
          <td><?php echo $data['jumlah'] ?></td>
          <td><?php echo $data['tanggal'] ?></td>
          <td><img width="50px" height="50px" src="./transaksi/img/<?php echo $data['foto']; ?>"></td>
          <td>
            <a href="halaman.php?page=transaksi/hapus&id=<?php echo $data['id_pembayaran'] ?>" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Bukti Transfer Pulsa Listrik -->
<div class="container" style="margin-top: 5em">
  <h2>Bukti Transfer Pulsa Listrik</h2>
  <div class="table-responsive">
    <?php
      $koneksi=mysqli_connect('localhost', 'root', '', 'db_sparepart') or die(mysqli_connect_error());
    $qry=mysqli_query($koneksi, "SELECT `file`, `nama`, `timestamp`, `nama_file`, `member` FROM `file` JOIN `pembeli` ON `file`.`member` = `pembeli`.`id_pembeli` WHERE `file`.`status` = 1;");
    ?>
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Tanggal</th>
          <th>Foto</th> 
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
          <td><img width="50px" height="50px" src="./product/images1/<?php echo $data['nama_file']; ?>"></td>
          <td>
            <div class="form-group" data-member="<?= $data["member"] ?>" data-file="<?= $data["file"] ?>">
              <input type="text" placeholder="Token">
              <button style="width: auto; margin-right: 1em" class="btn btn-warning col-sm-5 sendToken">Send</button>
            </div>
            <a style="width: auto; margin-right: 1em" href="halaman.php?page=transaksi/hapusGambar&id=<?php echo $data['file'] ?>" class="btn btn-danger col-sm-5 fa fa-trash-o fa-1x"></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script>
  $(document).ready(function(){
    $(".sendToken").click(function(){
      var memberID = $(this).closest('div').attr('data-member');
      var fileID = $(this).closest('div').attr('data-file');
      var token = $(this).closest('div').find('input').val();
      // console.log(memgiberID + " - " + fileID)
      console.log(token)

      $.ajax({
        url: "../../api.php",
        method: "POST",
        data: {
          action: "sendToken",
          memberID: memberID,
          fileID: fileID,
          token: token,
        },
        success: function (response) {
          location.reload();
        },
      })
    })
  })
</script>