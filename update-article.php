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
  <link rel="stylesheet" type="text/css" href="assets/editor/styles/simditor.css" />
</head>
<body>
<?php
include 'include/navbar-author.php';
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
<div class="container" style="padding-top:40px;">
<!--p class="text-center"><b>Add an Article.</b></p-->
<?php
session_start();

if (!empty($_POST)) {
    require_once "include/connect.php";
    $nm = $_POST["title"];
    $em = $_POST["date"];
    $ph = $_POST["fulltext"];
    $auth = $_SESSION["ti"];
    $sql = "update `articles` set `article_title`='" . $nm . "',`article_full_text`='" . $ph . "',`article_last_update`='" . $em . "' WHERE `article_title`='" . $_SESSION["ti"] . "' ";
    //$sql = "insert into articles values('" . $auth . "','" . $nm . "','" . $ph . "','" . $em . "')";
    //echo $sql;
    if ($con->query($sql) === true) {
        $_SESSION["ti"] = $nm;
        $_SESSION["pub"] = $em;
        $_SESSION["tex"] = $ph;
        echo "<br>";
        print '
                  <div class="alert alert-success" role="alert">
    <span class="alert-inner--text"><strong>Success: </strong> Updated Article ' . $nm . ' Successfully </span>
</div>
                  ';
        //header("Location:dashboard.php");
    } else {
        print '
  <div class="alert alert-warning" role="alert">
<span class="alert-inner--text"><strong>Error: </strong> Could not Update '. $con->error.'  </span>
</div>
  ';
    }
} else {
    include "include/connect.php";
    $nm=$_GET["name"];
    $sql = "SELECT * FROM articles where article_title='" . $nm . "'";
    //echo $sql;
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
        $_SESSION["ti"] = $row["article_title"];
        $_SESSION["pub"] = $row["article_last_update"];
        $_SESSION["tex"] = $row["article_full_text"];
    
    }
}
?>
<form method="post" action="update-article.php">
  <div class="form-group">
    <label for="exampleFormControlInput1">Article Title</label>
    <input type="text" class="form-control" value=<?php print "'" . $_SESSION["ti"] . "'";?> id="exampleFormControlInput1" name="title"   >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Last Updated Date</label>
    <input type="date" class="form-control" value=<?php print "'" . $_SESSION["pub"] . "'";?> id="exampleFormControlInput2" name="date" >
  </div>
  <div class="form-group">
  <textarea id="editor" name="fulltext" autofocus><?php print "" . $_SESSION["tex"] . "";?></textarea>
  </div>
  <input type="submit" class="btn btn-primary btn-block" value="Update Article">
</form>
</div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>
  <script src="assets/js/argon.js"></script>
<script type="text/javascript" src="assets/editor/scripts/module.js"></script>
<script type="text/javascript" src="assets/editor/scripts/uploader.js"></script>
<script type="text/javascript" src="assets/editor/scripts/hotkeys.js"></script>
<script type="text/javascript" src="assets/editor/scripts/simditor.js"></script>
  <script>
  var editor = new Simditor({
  textarea: $('#editor')
});
  </script>
  </body>
</html>