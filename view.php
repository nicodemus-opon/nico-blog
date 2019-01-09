<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Nico's Blog</title>
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="assets/css/argon.css" rel="stylesheet">
</head>
<body>
<?php
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if ($_SESSION["role"] == "super_user") {
    include 'include/navbar.php';
}
if ($_SESSION["role"] == "admin") {
    include 'include/navbar-admin.php';
}
if ($_SESSION["role"] == "author") {
    include 'include/navbar-author.php';
}
?>
<div class="container" style="padding-top:40px;">
<?php
require_once "include/connect.php";
$art = $_GET["article"];
session_start();
$sql = "SELECT * FROM articles where article_title='" . $art . "'";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $_SESSION["a"] = $row["authorId"];
    $_SESSION["t"] = $row["article_title"];
    $_SESSION["f"] = $row["article_full_text"];
    $_SESSION["p"] = $row["article_created_date"];

}
?>
<h3 class="text-center">
<?php echo $_SESSION["t"]; ?>
  <small class="text-muted"> by <?php echo $_SESSION["a"]; ?></small>
</h3>
<p>
<?php echo $_SESSION["f"]; ?>
</p>
<p class="text-muted">
    published on
<?php echo $_SESSION["p"]; ?>
</p>
</div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>
  <script src="assets/js/argon.js"></script>
  </body>
</html>