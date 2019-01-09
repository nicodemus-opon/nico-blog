<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Nico's Blog</title>

  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Icons -->
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Argon CSS -->
  <link type="text/css" href="assets/css/argon.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
if($_SESSION["role"]=="super_user"){
  include 'include/navbar.php';
}else{
  include 'include/navbar-admin.php';
}
?>
<div class="container" style="padding-top:40px;">
<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="card shadow border-0" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Update profile</h5>
    <h6 class="card-subtitle mb-2 text-muted">Administrator</h6>
    <p class="card-text">allow the Administrator to change his/her personal details including password but NOT the username.</p>
    <a href="update-profile.php" class="card-links btn btn-primary btn-block">Update profile</a>
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="card shadow border-0" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Manage Other Users</h5>
    <h6 class="card-subtitle mb-2 text-muted">Administrator</h6>
    <p class="card-text">allow the Administrator to
        Add a new Author,
        See a list of all other users,
        Update any Author's details,
        and Delete Authors.</p>
    <a href="users.php" class="card-links btn btn-primary btn-block">Manage Other Users</a>
  </div>
</div>
    </div>
    <div class="col-sm">
    <div class="card shadow border-0" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">View Articles</h5>
    <h6 class="card-subtitle mb-2 text-muted">Administrator</h6>
    <p class="card-text">allow the Administrator to see the last 6 posted Articles in a descending order by [article_created_date]</p>
    <a href="articles.php" class="card-links btn btn-primary btn-block">View Articles</a>
  </div>
</div>
    </div>
  </div>
</div>
</div>
<div class="container" style="padding-top:40px;">
<div class="container">
  <div class="row">
    <div class="col-sm">
    <div class="card shadow border-0" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Log Out</h5>
    <h6 class="card-subtitle mb-2 text-muted">Administrator</h6>
    <p class="card-text">allow the Admin to sign-out.</p>
    <a href="logout.php" class="card-links btn btn-primary btn-block">Log Out</a>
  </div>
</div>
    </div>
    <div class="col-sm">
    
    </div>
    <div class="col-sm">
    
    </div>
  </div>
</div>
</div>
  <!-- Core -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>

  <!-- Optional plugins -->
  <script src="assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>

  <!-- Theme JS -->
  <script src="assets/js/argon.js"></script>
  </body>
</html>