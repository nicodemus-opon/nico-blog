<!DOCTYPE html>
<html>
<?php
session_start();
?>
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
?>
<div class="container" style="padding-top:40px">
<div class="containerx">
  <div class="row">
    <div class="col-2">
      
    </div>
    <div class="col-8">
    <div class="">
    <?php 
                if (!empty($_POST))
                {
                  require_once("include/connect.php");
                  $passone=$_POST["passone"];
                  $passtwo=$_POST["passtwo"];
                  $ph=$_POST["phone"];
                  $em=$_POST["email"];
                  $fn=$_POST["fn"];
                  $ad=$_POST["address"];
                  if($passone==$passtwo){
                  $sql = "update users set Password='".$passone."',phone_Number='".$ph."',Address='".$ad."',Full_Name='".$fn."',email='".$em."' WHERE User_Name='".$_SESSION["username"]."' ";
                 // echo $sql;
$con->query($sql);
if ($con->query($sql)=== TRUE) {
  print '
                  <div class="alert alert-success" role="alert">
    <span class="alert-inner--text"><strong>Success: </strong> Updated Details Successful</span>
</div>
                  ';
               //header("Location:dashboard.php");
               $_SESSION["pass"] = $passone;
               $_SESSION["em"] = $em;
               $_SESSION["ph"] = $ph;
               $_SESSION["ad"] = $ad;
               $_SESSION["fn"] = $fn;
}else {
  print '
  <div class="alert alert-warning" role="alert">
<span class="alert-inner--text"><strong>Error: </strong> Could not update</span>
</div>
  ';  
                }
}else{
  print '
  <div class="alert alert-warning" role="alert">
<span class="alert-inner--text"><strong>Error: </strong> Passwords do not match</span>
</div>
  ';
}
 
                }
                
                ?>
    <form method="POST" action="update-profile.php">
    <div class="form-group">
      <label for="exampleInputEmail1">Full Name</label>
        <input type="text" name="fn" placeholder="Full Name" value=<?php print "'".$_SESSION["fn"]."'"; ?> class="form-control form-control-alternative" validate/>
      </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
        <input type="password" name="passone" placeholder="new password" value=<?php print "'".$_SESSION["pass"]."'"; ?> class="form-control form-control-alternative"/>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Password confirm</label>
        <input type="password" name="passtwo" placeholder="Repeat Password" value=<?php print "'".$_SESSION["pass"]."'"; ?> class="form-control form-control-alternative"/>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Phone</label>
        <input type="text" name="phone" placeholder="Phone" value=<?php print "'".$_SESSION["ph"]."'"; ?> class="form-control form-control-alternative"/>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Email</label>
        <input type="email" name="email" placeholder="Email" value=<?php print "'".$_SESSION["em"]."'"; ?> class="form-control form-control-alternative" validate/>
      </div>
      <div class="form-group">
      <label for="exampleInputEmail1">Address</label>
        <input type="text" name="address" placeholder="Address" value=<?php print "'".$_SESSION["ad"]."'"; ?> class="form-control form-control-alternative" validate/>
      </div>

  <br>
  <input class="btn btn-primary btn-block" type="submit" value="Update Details">
</form>
</div>
    </div>
    <div class="col-2">
      
    </div>
  </div>
</div>

</div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>
  <script src="assets/js/argon.js"></script>
  </body>
</html>