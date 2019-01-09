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
<?php
					function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
require_once "include/connect.php";
// Create connectionhjh
//echo "Connected successfully";
$sql = "select * from articles ORDER BY article_created_date DESC LIMIT 6";
//echo $sql;
$result = $con->query($sql);
if ($result->num_rows > 0) {
	echo '<div class="list-group">';
    while($row = $result->fetch_assoc()) {
		        echo '  
  <a href="view.php?article='.$row["article_title"].'" class="list-group-item list-group-item-action flex-column align-items-start ">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1 ">'.$row["article_title"].'</h5>
      <small> published on '.$row["article_created_date"].'</small>
    </div>
    <p class="mb-1">'.limit_text($row["article_full_text"],20).'</p>
    <small> by '.$row["authorId"].'</small>
  </a>
  
';

	}
	echo '</div>';
}
 else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
 
$con->close();
?>

</div>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/popper/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="assets/vendor/PLUGIN_FOLDER/PLUGIN_SCRIPT.js"></script>
  <script src="assets/js/argon.js"></script>
  </body>
</html>