<?php include_once("functions.php");
    
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coursepedia</title>
    <link rel="icon" href="dist/img/logo-cp.png">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body style="background:#F5F5F5">

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-secondary px-4 py-2">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="">
            <img class="bi me-2" width="32" height="32" role="img" src="dist/img/logo-cp.png"></img>
            Coursepedia
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php nav(); ?>
    </div>
</nav>

<div class="album p-4">
    <div class="container py-2 rounded-3 bg-danger bg-gradient shadow-sm">
        <h2 class="text-white text-center">Kategori Materi</h2>
    </div>
    <div class="row row-cols-md-3 g-3 py-4 mx-5">
    <?php
    $db = dbConnect();
        if($db->connect_errno==0) {
            $sql = "SELECT k.nama, m.";
            $res = $db->query($sql);
            if($res) {
                $data_paket = $res->fetch_all(MYSQLI_ASSOC);
                foreach($data_paket as $row) {
                    ?>
                    <div class="col">
                        <div class="card shadow" style="width: 360px;">
                            <div class="card-body">
                                <h4 class="card-title"><</h4>
                                <h5 class="card-text">Nama mentor</h5>
                                <p class="card-text">Jumlah materi</p>
                                <a href="#" class="btn btn-primary" style="width: 80px;">Buka</a>
                            </div>
                        </div>
                    </div>
                    <?php
                } $res->free();
            }
        }
    ?>
    </div>
</div>

<!-- footer -->
<footer class="footer mt-auto py-3 bg-dark">
    <div class="container">
        <span class="text-muted">&copy; 2022 Coursepedia. All Rights Reserved Kelompok 2 RPL</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>