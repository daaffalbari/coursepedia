<?php 
define("DEVELOPMENT", TRUE);
include_once("layout.php");
function dbConnect()
{
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

//DASHBOARD
function countAnggota()
{
	$db = dbConnect();
	if($db->connect_errno == 0)
    {
        $res = $db->query("SELECT COUNT(*) as jml_anggota FROM anggota");
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;   
    }
    else
        return FALSE;
}

function countKelas()
{
	$db = dbConnect();
	if($db->connect_errno == 0)
    {
        $res = $db->query("SELECT COUNT(*) as jml_kelas FROM kelas");
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;   
    }
    else
        return FALSE;
}

function countPaket()
{
	$db = dbConnect();
	if($db->connect_errno == 0)
    {
        $res = $db->query("SELECT COUNT(*) as jml_paket FROM paket_belajar");
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;   
    }
    else
        return FALSE;
}

function countMentor()
{
	$db = dbConnect();
	if($db->connect_errno == 0)
    {
        $res = $db->query("SELECT COUNT(*) as jml_mentor FROM mentor");
        if($res)
        {
            $data = $res->fetch_assoc();
            $res->free();
            return $data;
        }
        else
            return FALSE;   
    }
    else
        return FALSE;
}

function kodeOtomatisKelas()
{
    $db = dbConnect();
	if($db->connect_errno == 0)
    {
        $sql = "SELECT MAX(id_kelas) as kodeTerbesar FROM kelas";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows>0)
            {
                $data = $res->fetch_assoc();
                $id_kelas = $data['kodeTerbesar'];
                $urutan = (int) substr($id_kelas, 1, 3);
                $urutan++;

                $huruf = "K";
                $id_kelas = $huruf.sprintf("%03s", $urutan);
               
            } else 
            {
                $id_kelas = "K001";
            }
        }
        return $id_kelas;
    }
    else
        return FALSE;   
}

function getDataKelas($id)
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $sql = "SELECT * FROM kelas WHERE id_kelas = '$id'";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows>0)
            {
                $data = $res->fetch_assoc();
                $res->free();
                return $data;
            }
            else
                return FALSE;
        }
        else
            return FALSE;
    }
    else
        return FALSE;
}

?>