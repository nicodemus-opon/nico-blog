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
<a class="btn btn-primary" href="add-article.php">
  Add Article
</a>
<div>
<?php 
                if (!empty($_POST))
                {
                  require_once("include/connect.php");
                  $nm=$_POST["name"];
                  $em=$_POST["email"];
                  $ph=$_POST["phone"];
                  $pas="123";
                  $role="";
                  if($_SESSION["role"]=="super_user"){
                    $role="admin";
                  }else{
                    $role="author";
                  }
                  
                  $sql = "insert into users values('".$nm."','".$em."','".$ph."','".$role."','".$pas."')";
                 //echo $sql;
if ($con->query($sql)=== TRUE) {
  echo "<br>";
  print '
                  <div class="alert alert-success" role="alert">
    <span class="alert-inner--text"><strong>Success: </strong> Added User '.$nm.' Successfully default password:123</span>
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
                        <b>Author</b>
                      </th>
                      <th>
                        <b>Article Title</b>
                      </th>
                      <th>
                        <b>Text</b>
                      </th>
                      <th>
                        <b>Publish Date</b>
                      </th>
					  <th>
                        <b>Action</b>
                      </th>
  </thead>
  <tbody id="myTable">
  <?php
include "include/connect.php";
session_start();
$sql = "SELECT * FROM articles where authorId='".$_SESSION['username']."';";

//print($sql);
$result = $con->query($sql);
while ($row = $result->fetch_assoc()) {?>
                   <tr>
                   <td><?php echo $row['authorId']; ?></td>
                   <td><?php echo $row['article_title']; ?></td>
                   <td><?php echo $row['article_full_text']; ?></td>
                   <td><?php echo $row['article_created_date']; ?></td>
                   <td>
                          <div class="btn-group" role="group" >
  <a  href=<?php echo "'delete-article.php?name=".$row['article_title']."'"; ?> class="btn btn-danger" >Delete</a>
  <a  href=<?php echo "'update-article.php?name=".$row['article_title']."'"; ?> class="btn btn-secondary">Update</a>
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
    <label for="exampleFormControlInput1">Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Author Name">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput2" name="email" placeholder="Author email address">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput3">Phone</label>
    <input type="phone" class="form-control" id="exampleFormControlInput3" name="phone" placeholder="phone number">
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