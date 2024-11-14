<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data berdasarkan id_aktifitas
    $sql = "DELETE FROM tbl_aset WHERE id_aset = $id";

    if (mysqli_query($kon, $sql)) {
        echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($kon);
    }
} else {
    echo "ID tidak ditemukan";
}

mysqli_close($kon);
