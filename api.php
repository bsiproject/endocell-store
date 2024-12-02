<?php

$koneksi = new mysqli('localhost', 'root', '', 'db_sparepart');
$apiKey = '1e0e9609e7c82e2d7f3c0d2833a0d112';

if(isset($_GET["action"])) {
    $action = $_GET["action"];

    switch($action) {
        case "getCity":
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "key: $apiKey"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
            break;

        case "getProvince":
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "key: $apiKey"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
            break;

        case "getKab":
            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "key: $apiKey"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
            break;

        case "getCost":
            $origin = $_POST[""];
            $destination = $_POST[""];
            $weight = $_POST[""];
            $courier = $_POST[""];

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=$courier",
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $apiKey"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                echo $response;
            }
            break;

        case 'getAllPhone':
            $koneksi = new mysqli('localhost', 'root', '', 'db_sparepart');

            $pilih = "SELECT * FROM tbl_product a LEFT JOIN tbl_kategori b ON a.id_kategori=b.id_kategori WHERE a.id_kategori='1'";
            $query = $koneksi->query($pilih);
            while ($data = $query->fetch_assoc()) {
                $result[] = $data;
            }

            echo json_encode($result);
            break;

        case 'getPhoneByBrand':
            $phoneCode = $_GET["phoneCode"];
            $koneksi = new mysqli('localhost', 'root', '', 'db_sparepart');

            $pilih = "SELECT * FROM tbl_product a
                      LEFT JOIN tbl_merk b
                        ON a.id_merk=b.kode_merk
                      WHERE a.id_kategori='1'
                        AND a.id_merk != 0
                        AND a.id_merk = $phoneCode";
            $query = $koneksi->query($pilih);
            while ($data = $query->fetch_assoc()) {
                $result[] = $data;
            }

            echo json_encode($result);
            break;

        case 'saveFile':
            $fileName = $_GET["fileName"];
            $ID_pembeli = $_GET["idPembeli"];

            $insert = "INSERT INTO `file` 
                        (`file`, `nama_file`, 
                        `member`, `timestamp`) 
                      VALUES 
                        (NULL, '$fileName', 
                        '$ID_pembeli', current_timestamp());";

            $query = $koneksi->query($insert);

            if($query) {
                echo "success";
            } else {
                echo "Error : " . mysqli_error($koneksi);
            }
            break;

        case 'sendToken':
            $memberID = $_GET["memberID"];
            $fileID = $_GET["fileID"];
            $token = $_GET["token"];

            $update = "UPDATE `file` 
                       SET `token` = '$token' ,
                           `status` = '2'
                       WHERE `file`.`file` = $fileID;";

            $query = $koneksi->query($update);

            if($query) {
                echo "success";
            } else {
                echo "Error : " . mysqli_error($koneksi);
            }

            break;

        case 'deleteInfo':
            $fileID = $_GET["fileID"];
            $update = "UPDATE `file` 
                       SET `status` = '3'
                       WHERE `file`.`file` = $fileID;";

            $query = $koneksi->query($update);

            if($query) {
                echo "success";
            } else {
                echo "Error : " . mysqli_error($koneksi);
            }

            break;

        case 'changeAdminPassword':
            $oldUss = $_GET["oldUss"];
            $oldPass = $_GET["oldPass"];
            $newUss = $_GET["newUss"];
            $newPass = $_GET["newPass"];

            $checkQuery = "SELECT * FROM `admin` 
                           WHERE `user` = '$oldUss' 
                           AND `pass` = '$oldPass'";

            $startCheck = $koneksi->query($checkQuery);
            $isListed = mysqli_num_rows($startCheck);
            // echo $isListed;

            if($isListed > 0) {
                $data = mysqli_fetch_assoc($startCheck);
                $targetID = $data["id_admin"];

                $updateQuery = "UPDATE `admin` SET `user` = '$newUss',
                                                  `pass` = '$newPass'
                               WHERE `admin`.`id_admin` = $targetID;";

                $startUpdate = $koneksi->query($updateQuery);

                if($startUpdate) {
                    echo "success";
                } else {
                    echo "Error : " . mysqli_error($koneksi);
                }
            } else {
                echo "empty";
            }
            break;

        case 'getAllReport':
            $query = "SELECT addr.`id_alamat`,
                             addr.`id_pembeli`,
                             addr.`tanggal_peng`,
                             addr.`kode_pos`,
                             addr.`total_belanja`,
                             addr.`ongkos`,
                             addr.`kurir`,
                             addr.`total_kes`,
                             addr.`status`,
                             cust.`nama`,
                             cust.`telpon`,
                             cust.`alamat`,
                             pay.`id_pembayaran`,
                             pay.`bank` 
                      FROM `tbl_alamat` as addr 
                      LEFT JOIN `pembeli` as cust 
                        ON addr.id_pembeli = cust.id_pembeli
                      LEFT JOIN `pembayaran` AS pay 
                        ON addr.total_kes = pay.jumlah 
                        AND LOWER(cust.nama) = LOWER(pay.nama)
                      WHERE cust.id_pembeli IS NOT NULL
                      AND addr.status = 'Sedang Dikirim';";

            $sql = $koneksi->query($query);

            while ($data = mysqli_fetch_assoc($sql)) {
                $result[] = $data;
            }

            echo json_encode($result);
            break;

        case 'getReportByDate':
            $day = $_GET["day"];
            $month = $_GET["month"];
            $year = $_GET["year"];

            // If Day is Custom
            if($day !== "all" && $month == "all" && $year == "all") {
                $query = "SELECT addr.`id_alamat`,
                             addr.`id_pembeli`,
                             addr.`tanggal_peng`,
                             addr.`kode_pos`,
                             addr.`total_belanja`,
                             addr.`ongkos`,
                             addr.`kurir`,
                             addr.`total_kes`,
                             addr.`status`,
                             cust.`nama`,
                             cust.`telpon`,
                             cust.`alamat`,
                             pay.`id_pembayaran`,
                             pay.`bank` 
                          FROM `tbl_alamat` as addr 
                          LEFT JOIN `pembeli` as cust 
                          ON addr.id_pembeli = cust.id_pembeli
                          LEFT JOIN `pembayaran` AS pay 
                          ON addr.total_kes = pay.jumlah 
                          AND LOWER(cust.nama) = LOWER(pay.nama)
                          WHERE cust.id_pembeli IS NOT NULL
                          AND addr.status = 'Sedang Dikirim'
                          AND DAY(`tanggal_peng`) = $day";
                //  If Day & Month is Custom
            } elseif($day !== "all" && $month !== "all" && $year == "all") {
                $query = "SELECT addr.`id_alamat`,
                             addr.`id_pembeli`,
                             addr.`tanggal_peng`,
                             addr.`kode_pos`,
                             addr.`total_belanja`,
                             addr.`ongkos`,
                             addr.`kurir`,
                             addr.`total_kes`,
                             addr.`status`,
                             cust.`nama`,
                             cust.`telpon`,
                             cust.`alamat`,
                             pay.`id_pembayaran`,
                             pay.`bank` 
                          FROM `tbl_alamat` as addr 
                          LEFT JOIN `pembeli` as cust 
                          ON addr.id_pembeli = cust.id_pembeli
                          LEFT JOIN `pembayaran` AS pay 
                          ON addr.total_kes = pay.jumlah 
                          AND LOWER(cust.nama) = LOWER(pay.nama)
                          WHERE cust.id_pembeli IS NOT NULL
                          AND addr.status = 'Sedang Dikirim'
                          AND DAY(`tanggal_peng`) = $day
                          AND MONTH (`tanggal_peng`) = $month";
                // If Day, Month, Year is Custom
            } elseif($day !== "all" && $month !== "all" && $year !== "all") {
                $query = "SELECT addr.`id_alamat`,
                             addr.`id_pembeli`,
                             addr.`tanggal_peng`,
                             addr.`kode_pos`,
                             addr.`total_belanja`,
                             addr.`ongkos`,
                             addr.`kurir`,
                             addr.`total_kes`,
                             addr.`status`,
                             cust.`nama`,
                             cust.`telpon`,
                             cust.`alamat`,
                             pay.`id_pembayaran`,
                             pay.`bank` 
                          FROM `tbl_alamat` as addr 
                          LEFT JOIN `pembeli` as cust 
                          ON addr.id_pembeli = cust.id_pembeli
                          LEFT JOIN `pembayaran` AS pay 
                          ON addr.total_kes = pay.jumlah 
                          AND LOWER(cust.nama) = LOWER(pay.nama)
                          WHERE cust.id_pembeli IS NOT NULL
                          AND addr.status = 'Sedang Dikirim'
                          AND DAY(`tanggal_peng`) = $day
                          AND MONTH(`tanggal_peng`) = $month
                          AND YEAR(`tanggal_peng`) = $year";
                // If Month is Custom
            } elseif($day == "all" && $month !== "all" && $year == "all") {
                $query = "SELECT addr.`id_alamat`,
                             addr.`id_pembeli`,
                             addr.`tanggal_peng`,
                             addr.`kode_pos`,
                             addr.`total_belanja`,
                             addr.`ongkos`,
                             addr.`kurir`,
                             addr.`total_kes`,
                             addr.`status`,
                             cust.`nama`,
                             cust.`telpon`,
                             cust.`alamat`,
                             pay.`id_pembayaran`,
                             pay.`bank` 
                          FROM `tbl_alamat` as addr 
                          LEFT JOIN `pembeli` as cust 
                          ON addr.id_pembeli = cust.id_pembeli
                          LEFT JOIN `pembayaran` AS pay 
                          ON addr.total_kes = pay.jumlah 
                          AND LOWER(cust.nama) = LOWER(pay.nama)
                          WHERE cust.id_pembeli IS NOT NULL
                          AND addr.status = 'Sedang Dikirim'
                          AND MONTH(`tanggal_peng`) = $month";
                // If Month & Year is Custom
            } elseif($day == "all" && $month !== "all" && $year !== "all") {
                $query = "SELECT addr.`id_alamat`,
                             addr.`id_pembeli`,
                             addr.`tanggal_peng`,
                             addr.`kode_pos`,
                             addr.`total_belanja`,
                             addr.`ongkos`,
                             addr.`kurir`,
                             addr.`total_kes`,
                             addr.`status`,
                             cust.`nama`,
                             cust.`telpon`,
                             cust.`alamat`,
                             pay.`id_pembayaran`,
                             pay.`bank` 
                          FROM `tbl_alamat` as addr 
                          LEFT JOIN `pembeli` as cust 
                          ON addr.id_pembeli = cust.id_pembeli
                          LEFT JOIN `pembayaran` AS pay 
                          ON addr.total_kes = pay.jumlah 
                          AND LOWER(cust.nama) = LOWER(pay.nama)
                          WHERE cust.id_pembeli IS NOT NULL
                          AND addr.status = 'Sedang Dikirim'
                          AND MONTH(`tanggal_peng`) = $month
                          AND YEAR(`tanggal_peng`) = $year";
                // If Year is Custom
            } elseif($day == "all" && $month == "all" && $year !== "all") {
                $query = "SELECT * FROM `tbl_alamat` as addr 
                          LEFT JOIN `pembeli` as cust 
                          ON addr.id_pembeli = cust.id_pembeli
                          LEFT JOIN `pembayaran` AS pay 
                          ON addr.total_kes = pay.jumlah 
                          AND LOWER(cust.nama) = LOWER(pay.nama)
                          WHERE cust.id_pembeli IS NOT NULL
                          AND addr.status = 'Sedang Dikirim'
                          AND YEAR(`tanggal_peng`) = $year";
            } else {
                $query = "SELECT * FROM `tbl_alamat` as addr 
                          LEFT JOIN `pembeli` as cust 
                          ON addr.id_pembeli = cust.id_pembeli
                          LEFT JOIN `pembayaran` AS pay 
                          ON addr.total_kes = pay.jumlah 
                          AND LOWER(cust.nama) = LOWER(pay.nama)
                          WHERE cust.id_pembeli IS NOT NULL
                          AND addr.status = 'Sedang Dikirim'";
            }

            $sql = $koneksi->query($query);
            if(mysqli_num_rows($sql) > 0) {
                while ($data = mysqli_fetch_assoc($sql)) {
                    $result[] = $data;
                }

                echo json_encode($result);
            } else {
                echo "empty";
            }
            break;


    }
} else {
    echo "illegal access";
}
