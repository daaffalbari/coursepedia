<?php 
include_once("functions.php");
?>
<?php 
$db = dbConnect();
if($db->connect_errno==0)
{
    if(isset($_POST["btnLogin"]))
    {
        $email = $db->escape_string($_POST["email"]);
        $password = $db->escape_string($_POST["pass"]);
        $sql = "SELECT * FROM anggota WHERE email='$email' AND pass=PASSWORD('$password')";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows==1)
            {
                $data=$res->fetch_assoc();
                session_start();
                $_SESSION["id_anggota"]=$data["id_anggota"];
                $_SESSION["nama"]=$data["nama"];
                $_SESSION["jk"]=$data["jk"];
                $_SESSION["alamat"]=$data["alamat"];
                $_SESSION["no_telp"]=$data["no_telp"];
                $_SESSION["id_paket"]=$data["id_paket"];
                $_SESSION["id_kelas"]=$data["id_kelas"];
                $_SESSION["email"]=$data["email"];
                $_SESSION["password"]=$data["password"];
                header("Location: kategori.php");
            }
            else 
                header("Location: anggota-login.php?error=1");
        }
    }
    else 
        header("Location: anggota-login.php?error=2");
}
else 
    header("Location: anggota-login.php?error=3");
?>