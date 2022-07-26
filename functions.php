<?php 
define("DEVELOPMENT", TRUE);

function dbConnect(){
  $db = new mysqli("localhost","root","","coursepedia");
  return $db;
}

function showError($message) {
  ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Error!</h5>
        <?php echo $message; ?>
    </div>
    <?php
}

function nav(){
  ?>
  <nav class="navbar">
    <div class="container-fluid">
      <a href="index.php" class="navbar-brand">
        <img src="./assets/logo-cp-black.png" alt="logo" width="35" height="30" class="d-inline-block align-text-top">
        Coursepedia
      </a>
      <div class="d-flex justify-content-end">
      <a href="./admin/index.php" class="btn btn-primary">Login</a>
    </div>
    </div>
  </nav>
  <?php  
}

function footer(){
  ?>
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="index.php" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
      </a>
      <span class="mb-3 mb-md-0 text-muted">
        &copy; 2020 Coursepedia
      </span>
    </div>
    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="nav-item">
        <a href="#" class="nav-link text-muted">Privacy Policy</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-muted">Terms of Use</a>
      </li>
    </ul>
  </footer>
  <?php
}

?>