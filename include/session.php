<?php
include("include/connect.php");
$sql = "SELECT * FROM users WHERE name='".$_SESSION["username"]."' AND password='".$_SESSION["pass"]."'";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  session_start();
  while($row = $result->fetch_assoc()) {
      $_SESSION["role"] = $row["role"];
      $_SESSION["username"] = $row["name"];
      $_SESSION["pass"] = $row["password"];
      $_SESSION["em"] = $row["email"];
      $_SESSION["ph"] = $row["phone"];
  }
  ?>