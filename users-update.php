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
if($_SESSION["role"]=="super_user"){
  include 'include/navbar.php';
}
if($_SESSION["role"]=="admin"){
  include 'include/navbar-admin.php';
}
if($_SESSION["role"]=="author"){
  include 'include/navbar-author.php';
}
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
  <?php
include "include/connect.php";
$nm = $_GET["name"];
$hh=$_GET["name"];
session_start();
$sql = "SELECT * FROM users where User_Name='" . $nm . "'";
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {
    $_SESSION["phr"] = $row["phone_Number"];
    $_SESSION["emr"] = $row["email"];
    $_SESSION["nmr"] = $row["Full_Name"];
    $_SESSION["adr"] = $row["Address"];
    $_SESSION["hh"] = $hh;

}?>

<div class="container" style="padding-top:40px;">
<?php
if (!empty($_POST)) {
    require_once "include/connect.php";
    $nm = $_POST["name"];
    $ph = $_POST["phone"];
    $em = $_POST["email"];
    $ad = $_POST["ad"];
    session_start();
    $sql = "update users set Full_Name='" . $nm . "',phone_Number='" . $ph . "',email='" . $em ."',Address='" . $ad . "' WHERE User_Name='" . $_SESSION["hh"] . "' ";
    //echo $sql;
    if ($con->query($sql) === true) {
        $_SESSION["phr"] = $ph;
        $_SESSION["emr"] = $em;
        $_SESSION["nmr"] = $nm;
        $_SESSION["adr"] = $ad;
        print '
                  <div class="alert alert-success" role="alert">
    <span class="alert-inner--text"><strong>Success: </strong> Updated Details Successful</span>
</div>
                  ';
    } else {
        print '
  <div class="alert alert-warning" role="alert">
<span class="alert-inner--text"><strong>Error: </strong> Could not update</span>
</div>
  ';
    }

}

?>
<p class="text-center"><b>Update Author Details</b></p>
<form method="post" action="users-update.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name"  value=<?php print "'" . $_SESSION["nmr"] . "'";?>  placeholder="Member Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput2" name="email"  value=<?php print "'" . $_SESSION["emr"] . "'";?>  placeholder="Member email address">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput3">Phone</label>
    <input type="phone" class="form-control" id="exampleFormControlInput3" name="phone"  value=<?php print "'" . $_SESSION["phr"] . "'";?>  placeholder="phone number">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Address</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="ad"  value=<?php print "'" . $_SESSION["adr"] . "'";?>  placeholder="Member Name">
  </div>
  <input type="submit" class="btn btn-primary btn-block" value="Update">
</form>

</div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>
  <script src="assets/js/argon.js"></script>
  </body>
</html>