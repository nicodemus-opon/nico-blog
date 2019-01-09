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
?>
<div class="container" style="padding-top:40px;">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Users
</button>
<div>
<?php 
                if (!empty($_POST))
                {
                  require_once("include/connect.php");
                  $nm=$_POST["name"];
                  $em=$_POST["email"];
                  $ph=$_POST["phone"];
                  $ad=$_POST["ad"];
                  $fn=$_POST["fn"];
                  $ac="100";
                  $digits=5;
                  $uid=strval(rand(pow(10, $digits-1), pow(10, $digits)-1));
                  $pas="123";
                  $pro="profile.png";
                  $role="";
                  if($_SESSION["role"]=="super_user"){
                    $role="admin";
                  }else{
                    $role="author";
                  }
                  
                  $sql = "insert into users values('".$uid."','".$fn."','".$em."','".$ph."','".$nm."','".$pas."','".$role."','".$ac."','".$pro."','".$ad."')";
                 //echo $sql;
if ($con->query($sql)=== TRUE) {
  echo "<br>";
  print '
                  <div class="alert alert-success" role="alert">
    <span class="alert-inner--text"><strong>Success: </strong> Added User '.$nm.' Successfully login with username and default password:123</span>
</div>
                  ';
               //header("Location:dashboard.php");
}else {
  print '
  <div class="alert alert-warning" role="alert">
<span class="alert-inner--text"><strong>Error: </strong> Could not add  User</span>
</div>
  ';  
                }
                }else{
                  echo "<br>";
                  echo "<br>";
                }
                
                ?>
</div>

<table class="table">
  <thead class="thead-primary">
  <th>
                        <b>User Name</b>
                      </th>
                      <th>
                        <b>Full Name</b>
                      </th>
                      <th>
                        <b>Email Address</b>
                      </th>
                      <th>
                        <b>Phone</b>
                      </th>
                      <th>
                        <b>Address</b>
                      </th>
                      <th>
                        <b>User Type</b>
                      </th>
					  <th>
                        <b>Action</b>
                      </th>
  </thead>
  <tbody id="myTable">
  <?php
include "include/connect.php";
session_start();
$sql="";
if($_SESSION["role"]=="super_user"){
  $sql = "SELECT * FROM users where UserType<>'super_user'";
}
if($_SESSION["role"]=="admin"){
  $sql = "SELECT * FROM users where UserType='author'";
}
//print($sql);
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {?>
                   <tr>
                   <td><?php echo $row['User_Name']; ?></td>
                   <td><?php echo $row['Full_Name']; ?></td>
                   <td><?php echo $row['email']; ?></td>
                   <td><?php echo $row['phone_Number']; ?></td>
                   <td><?php echo $row['Address']; ?></td>
                   <td><?php echo $row['UserType']; ?></td>
                   <td>
                          <div class="btn-group" role="group" >
  <a  href=<?php echo "'delete-user.php?name=".$row['User_Name']."'"; ?> class="btn btn-danger" >Delete</a>
  <a  href=<?php echo "'users-update.php?name=".$row['User_Name']."'"; ?> class="btn btn-secondary">Update</a>
</div>
                        </td>
                   </tr>
              <?php }?>


  </tbody>
</table>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="users.php">

  <div class="form-group">
    <label for="exampleFormControlInput1">User Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="User Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Full Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="fn" placeholder="Full Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput2" name="email" placeholder="User email address">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput3">Phone</label>
    <input type="phone" class="form-control" id="exampleFormControlInput3" name="phone" placeholder="phone number">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Address</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="ad" placeholder="Address">
  </div>
  <input type="submit" class="btn btn-primary" value="Add User">
</form>
      </div>
      <div class="modal-footer">
       <p>when a new user is created a default password of "123" is given</p>
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