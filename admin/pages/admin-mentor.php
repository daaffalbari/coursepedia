<?php 
session_start();
if(!isset($_SESSION["id_admin"]))
{
    header("Location: ../index.php?error=4");
}
include_once("functions.php");
include_once("layout.php");
?>
<?php style_section() ?>
<?php top_section() ?>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mentor</h1>
          </div><!-- /.col -->   
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin-dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Mentor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <?php 
        if(isset($_GET["success"]))
        {
            $success = $_GET["success"];
            if($success == 1)
              showSuccess("Data berhasil disimpan.");
            else if($success == 2)
              showSuccess("Data berhasil diubah.");
            else if($success == 3)
              showSuccess("Data berhasil dihapus.");
        }
      ?>
      <button type="button" class="btn btn-app" data-toggle="modal" data-target="#modal-lg">
        <i class="fas fa-plus"></i> Tambah
      </button>

      <!-- Modal tambah mentor -->
      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <form action="" method="post">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Data Mentor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="id_mentor">ID Mentor</label>
                  <input type="text" class="form-control" id="id_mentor" name="id_mentor" value="<?php echo kodeOtomatisMentor()?>" readonly>
                </div>
                <div class="form-group">
                  <label for="nama_mentor">Nama Mentor</label>
                  <input type="text" class="form-control" id="nama_mentor" name="nama_mentor" placeholder="Masukan Nama Mentor" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="jk">Jenis Kelamin</label>
                  <select class="form-control" id="jk" name="jk" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">L</option>
                    <option value="Perempuan">P</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required></textarea>  
                </div>
                <div class="form-group">
                  <label for="no_hp">No. HP</label>
                  <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No. HP" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" autocomplete="off" required>
                </div>  
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="btnSimpan">Simpan</button>
              </div>              
            </div>
          </form>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mentor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                    <tr>
                      <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID Mentor</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nama</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">JK</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Alamat</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">No.Telepon</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Username</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Password</th>
                      <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>  
                      <?php 
                      $db = dbConnect();
                      if($db->connect_errno==0)
                      {
                          $sql = "SELECT * FROM mentor";
                          $res = $db->query($sql);
                          if($res)
                          {
                              $data_mentor = $res->fetch_all(MYSQLI_ASSOC);
                              foreach($data_mentor as $row)
                              {
                                echo "<tr>
                                  <td class='dtr-control sorting_1' tabindex='0'>".$row['id_mentor']."</td>
                                  <td>".$row['nama']."</td>
                                  <td>".$row['jk']."</td>
                                  <td>".$row['alamat']."</td>
                                  <td>".$row['no_telp']."</td>
                                  <td>".$row['username']."</td>
                                  <td>".substr($row['pass'],0, 10)."</td>
                                  <td>
                                      <a href='admin-mentor.php?aksi=ubah&id_mentor=".$row['id_mentor']."' class='btn btn-sm btn-info'><i class='fas fa-edit'></i></a> | 
                                      <a href='admin-mentor.php?aksi=hapus&id_mentor=".$row['id_mentor']."' class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></a>
                                  </td>
                              </tr>";
                              }
                              $res->free();
                          }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php bottom_section() ?>
<?php script_section() ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>