<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Aset</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              DATA ASET
            </div>
            <div class="card-body">
              <a href="create.php" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
              <table class="table table-hover" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">NAMA ASET</th>
                    <th scope="col">DESKRIPSI ASET</th>
                    <th scope="col">JENIS ASET</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">LOKASI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                      include('koneksi.php');
                      $query = mysqli_query($kon,"SELECT * FROM tbl_aset");
                      while($row = mysqli_fetch_array($query)){
                  ?>

                  <tr>
                      <td><?php echo $row['nama_aset'] ?></td>
                      <td><?php echo $row['deskripsi_aset'] ?></td>
                      <td><?php echo $row['jenis_aset'] ?></td>
                      <td><?php echo $row['status'] ?></td>
                      <td><?php echo $row['lokasi'] ?></td>
                      <td class="text-center">
                        <a href="edit.php?id=<?php echo $row['id_aset'] ?>" class="btn btn-sm btn-primary">EDIT</a>
                        <a href="delete.php?id=<?php echo $row['id_aset'] ?>" class="btn btn-sm btn-danger">HAPUS</a>
                      </td>
                  </tr>

                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>
  </body>
</html>