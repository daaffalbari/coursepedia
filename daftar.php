<?php
    include_once("functions.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coursepedia</title>
    <link rel="icon" href="anggota/dist/img/logo-cp.png">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body class="bg-dark bg-gradient">

<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-light px-4 py-2 mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="main.php">
        <img class="bi me-2" width="29" height="32" role="img" src="anggota/dist/img/logo-cp-black2.png"></img>
        <strong>Coursepedia</strong></a>
    </div>
</nav>

<!-- title -->
<div class="container py-2 text-white text-center">
    <h2 class="text-warning">Pendaftaran Anggota</h2>
    <p>Silahkan isi form dibawah ini</p>
</div>

<!-- form -->
<div class="container p-4 mb-5 rounded-3 shadow bg-light">
    <form class="needs-validation" novalidate="">
        <div class="row g-4">
        <form action="anggota/login.php" method="post">
            <!-- form kiri -->
            <div class="col-6">
                <div class="m-3">
                    <div class="row g-3">
                        <!-- nama -->
                        <div class="col-12">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                <input type="text" class="form-control" pattern="[A-Za-z\s']+" placeholder="Nama Lengkap" required="">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div><span class="form-text">
                            Must not contain numbers, special characters, or emoji.
                            </span></div>
                        </div>
                        <!-- jenis kelamin -->
                        <div class="col-sm-12">
                            <label class="form-label fw-semibold">Jenis Kelamin</label>
                            <table><tr>
                            <td><div class="form-check">
                                <input id="lk" name="jk" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="lk">Laki-laki</label>&emsp;
                            </div></td><div class="w-50">
                            <td><div class="form-check">
                                <input id="pr" name="jk" type="radio" class="form-check-input" required="">
                                <label class="form-check-label" for="pr">Perempuan</label>
                            </div></td>
                            </tr></table>
                        </div>
                        <!-- alamat -->
                        <div class="col-12">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                <input type="text" class="form-control" placeholder="Alamat" required="">
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <!-- notelp -->
                        <div class="col-12">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                <input type="text" class="form-control" pattern="[0-9]+" placeholder="No. Telp/Handphone" required="">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div><span class="form-text">
                            e.g 08XXXXXXXXXX
                            </span></div>
                        </div>
                        <!-- email -->
                        <div class="col-12">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control" placeholder="Email" required="">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div><span class="form-text">
                                name@example.com
                            </span></div>
                        </div>
                        <!-- password -->
                        <div class="col-12">
                            <div class="input-group has-validation">
                                <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                                <input type="text" class="form-control" minlength="8" maxlength="20" pattern="[A-Za-z0-9]+" placeholder="Password" required="">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div><span class="form-text">
                            Must be 8-20 characters long and must not contain spaces, special characters, or emoji.
                            </span></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- form kanan -->
            <div class="col-6">
                <div class="p-4 shadow-sm rounded-3 m-3 bg-secondary bg-gradient bg-opacity-25">
                    <h4 class="mb-4 text-center">Rincian Pembayaran</h4>
                    <div class="row g-3 mb-4">
                        <ul class="list-group">
                            <!-- no tagihan -->
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <h6 class="my-0">No. Tagihan</h6>
                                <input type="text" value="<?php kodeOtomatisTagihan(); ?>" style="border:0" disabled>
                            </li>
                            <!-- get paket yg diambil -->
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <h6 class="my-0">Paket Belajar</h6>
                                <span class="text-muted">Paket Belajar Kelas 1 SD Full 1 Tahun</span>
                            </li>
                            <!-- harga -->
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <h6 class="my-0">Harga Paket</h6>
                                <span class="text-muted">Rp500.000</span>
                            </li>
                        </ul>
                        <!-- total bayar -->
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <h6 class="my-0">Total Bayar</h6>
                                <span class="fw-bold text-primary">Rp500.000</span>
                            </li>
                        </ul>
                    </div>
                    <!-- btn bayar -->
                    <button class="w-100 btn btn-success btn-lg" type="submit" name="btnRegister">Bayar</button>
                </div>
            </div>
        </form>
        </div>
    </form>
</div>

<!-- footer -->
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">&copy; 2022 Coursepedia. All Rights Reserved Kelompok 2 RPL</span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</html>