<?php 
define("DEVELOPMENT", TRUE);

function dbConnect(){
  $db = new mysqli("localhost","root","","coursepedia");
  return $db;
}

function showSuccess($success)
{   
    ?>
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i> Informasi</h5>
        <?php echo $success ?>
    </div>
<?php
}

function showError($message)
{   
    ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Error!</h5>
        <?php echo $message; ?>
    </div>
<?php
// script_section();
}

function nav() {
    session_start();
    if(!isset($_SESSION["id_anggota"]))
		header("Location: login.php?error=4");
    ?>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="nav navbar-nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 fw-semibold">
            <li class="nav-item"><a href="kategori.php" class="nav-link px-2 text-white">Home</a></li>
        </ul>
        <div class="dropdown d-flex lh-sm">
            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="border:0">
                <span class="fw-semibold text-white"><?php echo $_SESSION["nama"]; ?>&emsp;
                <img src="dist/img/avatar.png" width="32" height="32" class="rounded-circle me-2">
                </span>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
    <?php
}

function footer(){
  ?>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; 2022 Coursepedia. All Rights Reserved To Kelompok 2 RPL</span>
    </div>
  </footer>
  <?php
}

function kodeOtomatisTagihan()
{
    $db = dbConnect();
	if($db->connect_errno == 0)
    {
        $sql = "SELECT MAX(no_invoice) as kodeTerbesar FROM tagihan";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows>0)
            {
                $data = $res->fetch_assoc();
                $no_invoice = $data['kodeTerbesar'];
                $urutan = (int) substr($no_invoice, 10, 4);
                $urutan++;

                $huruf = "INV/PB/000";
                $no_invoice = $huruf.sprintf("%04s", $urutan);
               
            } else 
            {
                $no_invoice = "INV/PB/0001";
            }
        }
        return $no_invoice;
    }
    else
        return FALSE;   
}

?>