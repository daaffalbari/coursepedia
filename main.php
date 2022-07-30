<?php include_once("functions.php"); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coursepedia</title>
    <link rel="icon" href="./assets/logo-cp.png">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-dark bg-gradient">

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-light px-4 py-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="main.php">
        <img class="bi me-2" width="29" height="32" role="img" src="./assets/logo-cp-black2.png"></img>
        <strong>Coursepedia</strong></a>
        <div class="text-end">
                <a href="anggota/login.php" class="btn btn-warning" style="width:80px"><b>Login</b></a>
        </div>
    </div>
</nav>

<!-- desc -->
<div class="p-5 bg-gradient" style="background:#990033">
    <div class="row flex-lg-row-reverse align-items-center g-5">
        <div class="col-10 col-sm-8 col-lg-5">
            <img src="./assets/main-bg.png" class="d-block mx-lg-auto img-fluid" loading="lazy">
        </div>
        <div class="col-lg-7">
            <h1 class="display-5 fw-bold text-white">Dear, Coursepedian !</h1>
            <p class="col-md-10 fs-4 text-white">Raih impianmu dengan belajar lebih menyenangkan dan interaktif bersama Coursepedia</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <h4 class="fw-bold" style="color:#F0E68C">Ayo daftar sekarang !</h4>
            </div>
        </div>
    </div>
</div>
<div class="bg-light p-3"></div>

<!-- paket belajar -->
<div class="pricing-header px-5 py-4 mx-auto text-center">
    <h1 class="display-6 fw-normal text-white">Paket Belajar</h1>
    <p class="fs-5 mb-4 text-white">Silahkan pilih paket belajar yang kamu mau</p>
    <div class="row row-cols-1 row-cols-md-3 py-4 px-3 rounded-3 mb-4 text-center bg-light">
    <?php 
        $db = dbConnect();
        if($db->connect_errno==0) {
            $sql = "SELECT * FROM paket_belajar";
            $res = $db->query($sql);
            if($res) {
                $data_paket = $res->fetch_all(MYSQLI_ASSOC);
                foreach($data_paket as $row) {
                    ?>
                    <div class="col mb-4">
                        <div class="card rounded-3 shadow">
                            <form action="daftar.php" method="post">
                                <div class="card-header py-3 bg-gradient" style="background:#D2691E;color:white">
                                    <h5 class="my-0 fw-normal"><?php echo $row['nama']; ?></h5>
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title pricing-card-title" style="color:#D2691E">Rp. <?php echo number_format($row['harga'],0,',','.'); ?><small class="fw-light">/tahun</small></h3>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>Akses semua materi</li>
                                        <li>Free video pembelajaran</li>
                                    </ul>
                                    <button type="submit" class="w-100 btn btn-lg btn-outline-primary">Pilih Paket</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                } $res->free();
            }
        }
        ?>
    </div>
</div>

<?php footer(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>