<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_aset = $_POST['nama_aset'];
    $deskripsi_aset = $_POST['deskripsi_aset'];
    $jenis_aset = $_POST['jenis_aset'];
    $status = $_POST['status'];
    $lokasi = $_POST['lokasi'];

    // Query untuk menambahkan data ke database
    $sql = "INSERT INTO tbl_aset (nama_aset, deskripsi_aset, jenis_aset, status, lokasi)
    VALUES ('$nama_aset', '$deskripsi_aset', '$jenis_aset', '$status', '$lokasi')";
    if (mysqli_query($kon, $sql)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($kon);
    }
}

mysqli_close($kon);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Tambah Data Baru</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="nama_aset">Nama Aset</label>
                <input type="text" class="form-control" id="nama_aset" name="nama_aset" required>
            </div>
            <div>
            <label for="deskripsi_aset">Deskripsi Aset</label>
            <textarea name="deskripsi_aset" class="form-control" id="deskripsi_aset" placeholder="Masukkan Deskripsi Aset"></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_aset">Jenis Aset</label>
                <select class="form-control" id="jenis_aset" name="jenis_aset" required>
                    <option value="">-- Pilih Aset --</option>
                    <option value="Kategori 1">Kategori 1</option>
                    <option value="Kategori 2">Kategori 2</option>
                    <option value="Kategori 3">Kategori 3</option>
                    <!-- Tambahkan opsi kategori lainnya sesuai kebutuhan -->
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Baik">Baik</option>
                    <option value="Rusak">Rusak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <select class="form-control" id="lokasi" name="lokasi" required>
                    <option value="">-- Pilih Lokasi --</option>
                    <option value="Gedung A">Gedung A</option>
                    <option value="Gedung B">Gedung B</option>
                    <option value="Gedung C">Gedung C</option>
                    <option value="Gedung D">Gedung D</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
