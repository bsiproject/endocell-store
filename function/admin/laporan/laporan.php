<head>
<!-- <script src="https://cdn.jsdelivr.net/npm/pdf-lib@1.17.1/dist/pdf-lib.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
  <style>
    .table-wrapper{
      background-color: #d9edf7;
      margin: 2em 0em;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0px 10px 15px #b4b4b459;
    }

    #reportSelector{
      margin-top: 3em;
      display: flex;
      gap: 3em;
    }

    .select-wrapper {
      display: flex;
      align-items: center;
    }

    .select-wrapper p {
      font-size: 1.3em;
      margin-right: .7em;
    }

    .select-wrapper select {
      font-size: 1.3em;
    }
  </style>


</head>

<div class="container">
  <h2>Laporan Penjualan</h2>
  <div id="reportSelector">
    <div class="select-wrapper">
      <p>Tanggal : </p>
      <select id="dayPeriode">
        <option value="all">Semua</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
      </select>
    </div>
    <div class="select-wrapper">
      <p>Bulan : </p>
      <select id="monthPeriode">
        <option value="all">Semua</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
    </div>
    <div class="select-wrapper">
      <p>Tahun : </p>
      <select id="yearPeriode">
        <option value="all">Semua</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
    </div>
  </div>
  <div class="table-wrapper">
    <table id="tableLaporan" class="display">
      <thead>
          <tr>
              <th>No.</th>
              <th>Pembeli</th>
              <th>Telepon</th>
              <th>Belanja</th>
              <th>Ongkir</th>
              <th>Total</th>
              <th>Ekspedisi</th>
              <th>Pembayaran</th>
              <th>Alamat Tujuan</th>
              <th>Kode POS</th>
              <th>Tanggal</th>
          </tr>
      </thead>
      <tbody id="tbodyLaporan"></tbody>
    </table>
  </div>
  <button id="btnDownload" class="btn btn-warning" style="font-size: 1.3em">Download PDF</button>
  <br><br><br><br><br>
</div>



<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  $(document).ready(function(){
    // Send Token
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

    // Data Table
    $.ajax({
      url: "../../api.php",
      method: 'POST',
      data: {
        action: 'getAllReport',
      },
      success: function(response){
        var jsonData = JSON.parse(response);
        var getYear = [];

        $("#tbodyLaporan").empty();
        $("#yearPeriode").empty();

        jsonData.forEach(function(value, index){
          $("#tbodyLaporan").append(`
            <tr>
              <td class="text-center" style="font-weight: bold">${index+1}</td>
              <td style="font-weight: bold">${value.nama}</td>
              <td>${value.telpon}</td>
              <td>${value.total_belanja}</td>
              <td>${value.ongkos}</td>
              <td>${value.total_kes}</td>
              <td>${value.kurir}</td>
              <td>${(value.bank == null) ? "Bank" : value.bank}</td>
              <td>${value.alamat}</td>
              <td>${value.kode_pos}</td>
              <td>${value.tanggal_peng}</td>
            </tr>
          `);

          var year = value.tanggal_peng.split("-")[0];
          getYear.push(year)
        });

        // Menggunakan Set untuk mendapatkan tahun unik
        var uniqYear = new Set(getYear);
        $("#yearPeriode").append(`
          <option value="all">Semua</option>
        `);

        uniqYear.forEach(function(year){
          $("#yearPeriode").append(`
            <option value="${year}">${year}</option>
          `);
        })

        $('#tableLaporan').DataTable();
      }
    });

    $("#dayPeriode").change(function(){
      getDataReport("day", $(this).val());
    })

    $("#monthPeriode").change(function(){
      getDataReport("month", $(this).val());
    })

    $("#yearPeriode").change(function(){
      getDataReport("year", $(this).val());
    })

    var doc = new jsPDF();
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $("#btnDownload").click(async function(){
      window.print()
    })
    
  })
</script>
<script>
  function getDataReport(type,changeDate){
    var day = $("#dayPeriode").val();
    var month = $("#monthPeriode").val();
    var year = $("#yearPeriode").val();

    if(type == "day"){
      day = changeDate;
    } else if(type == "month"){
      month = changeDate;
    } else {
      year = changeDate;
    }

    // Data Table
    $.ajax({
      url: "../../api.php",
      method: 'POST',
      data: {
        action: 'getReportByDate',
        day: day,
        month: month,
        year: year
      },
      success: function(response){
        if(response == "empty"){
          Swal.fire({
            icon: 'error',
            title: 'Kosong!',
            text: 'Tidak ada data penjualan di tanggal tersebut',
          }).then((e)=>{
            if(e.isConfirmed){
              window.location.reload()
            }
          })
        } else {
          var jsonData = JSON.parse(response);
          
          $("#tbodyLaporan").empty();
          
          jsonData.forEach(function(value, index){
              $("#tbodyLaporan").append(`
                <tr>
                  <td class="text-center" style="font-weight: bold">${index+1}</td>
                  <td style="font-weight: bold">${value.nama}</td>
                  <td>${value.telpon}</td>
                  <td>${value.total_belanja}</td>
                  <td>${value.ongkos}</td>
                  <td>${value.total_kes}</td>
                  <td>${value.kurir}</td>
                  <td>${(value.bank == null) ? "Bank" : value.bank}</td>
                  <td>${value.alamat}</td>
                  <td>${value.kode_pos}</td>
                  <td>${value.tanggal_peng}</td>
                </tr>
              `);
            });
            
            $('#tableLaporan').DataTable();
          }
      }
    });
  }
</script>