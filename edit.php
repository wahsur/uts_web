<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data berdasarkan id_aktifitas
    $sql = "SELECT * FROM tbl_aset WHERE id_aset = $id";
    $result = mysqli_query($kon, $sql);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        echo "Data tidak ditemukan";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_aset'];
    $nama_aset = $_POST['nama_aset'];
    $dekripsi_aset = $_POST['deskripsi_aset'];
    $jenis_aset = $_POST['jenis_aset'];
    $status = $_POST['status'];
    $lokasi = $_POST['lokasi'];

    // Update data
    $sql = "UPDATE tbl_aset SET 
            nama_aset = '$nama_aset',
            deskripsi_aset = '$dekripsi_aset',
            jenis_aset = '$jenis_aset',
            status = '$status',
            lokasi = '$lokasi'
            WHERE id_aset = $id";

    if (mysqli_query($kon, $sql)) {
        echo "<script>alert('Data berhasil diupdate'); window.location='index.php';</script>";
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
    <title>Edit Data</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Data</h2>
        <form action="" method="post">
            <input type="hidden" name="id_aset" value="<?php echo $row['id_aset']; ?>">
            <div class="form-group">
                <label for="nama_aset">Nama Aset</label>
                <input type="text" class="form-control" id="nama_aset" name="nama_aset" value="<?php echo htmlspecialchars($row['nama_aset']); ?>" required>
            </div>
            <div>
                <label for="deskripsi_aset">Deskripsi Aset</label>
                <textarea name="deskripsi_aset" class="form-control" id="deskripsi_aset" required><?php echo htmlspecialchars($row['deskripsi_aset']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_aset">Jenis Aset</label>
                <select class="form-control" id="jenis_aset" name="jenis_aset" required>
                    <option value="">-- Pilih Aset --</option>
                    <option value="Kategori 1" <?php if ($row['jenis_aset'] == 'Kategori 1') echo 'selected'; ?>>Kategori 1</option>
                    <option value="Kategori 2" <?php if ($row['jenis_aset'] == 'Kategori 2') echo 'selected'; ?>>Kategori 2</option>
                    <option value="Kategori 3" <?php if ($row['jenis_aset'] == 'Kategori 3') echo 'selected'; ?>>Kategori 3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Baik" <?php if ($row['status'] == 'Baik') echo 'selected'; ?>>Baik</option>
                    <option value="Rusak" <?php if ($row['status'] == 'Rusak') echo 'selected'; ?>>Rusak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <select class="form-control" id="lokasi" name="lokasi" required>
                    <option value="">-- Pilih Lokasi --</option>
                    <option value="Gedung A" <?php if ($row['lokasi'] == 'Gedung A') echo 'selected'; ?>>Gedung A</option>
                    <option value="Gedung B" <?php if ($row['lokasi'] == 'Gedung B') echo 'selected'; ?>>Gedung B</option>
                    <option value="Gedung C" <?php if ($row['lokasi'] == 'Gedung C') echo 'selected'; ?>>Gedung C</option>
                    <option value="Gedung D" <?php if ($row['lokasi'] == 'Gedung D') echo 'selected'; ?>>Gedung D</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

