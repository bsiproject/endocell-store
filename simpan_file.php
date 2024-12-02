<?php

if(isset($_FILES['file'])) {
    $targetDir = './function/admin/product/images1/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);

    if(move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        echo 'File berhasil disimpan.';
    } else {
        echo 'Gagal menyimpan file.';
    }
}
