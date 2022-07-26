<?php 
include_once("functions.php");
session_start();
if(isset($_POST["btnUpdate"]))
{
    $db = dbConnect();
    if($db->connect_errno==0)
    {
        $id_kelas = $db->escape_string($_POST["id_kelas"]);
        $nama = $db->escape_string($_POST["nama"]);

        $sql = "UPDATE kelas SET nama='$nama' WHERE id_kelas='$id_kelas'";
        $res = $db->query($sql);
        if($res)
        {
            if($db->affected_rows>0)
            {
                header("Location: admin-kelas.php?success=2");
            }
        }
        else
            return FALSE;
    }
    else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
