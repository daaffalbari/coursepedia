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