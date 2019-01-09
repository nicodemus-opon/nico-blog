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
<body style="background-image:url('assets/img/bg.png');background-size:cover;background-repeat:no-repeat;">
<main>
    <section class="">
      <div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <b>SIGN IN </b>
                  <div class="text-center"><small>default superuser credentials <br> name="root" password="123"</small></div>


                </div>
                <?php
if (!empty($_POST)) {
    require_once "include/connect.php";
    $usrname = $_POST["username"];
    $pssword = $_POST["password"];
    //echo "password";
    $sql = "SELECT * FROM users WHERE User_Name='" . $usrname . "' AND Password='" . $pssword . "'";
    //print $sql;
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        session_start();
        while ($row = $result->fetch_assoc()) {
            $_SESSION["role"] = $row["UserType"];
            $_SESSION["username"] = $row["User_Name"];
            $_SESSION["pass"] = $row["Password"];
            $_SESSION["em"] = $row["email"];
            $_SESSION["ad"] = $row["Address"];
            $_SESSION["pro"] = $row["profile_Image"];
            $_SESSION["fn"] = $row["Full_Name"];
            $_SESSION["ph"] = $row["phone_Number"];
        }
        print '
                  <div class="alert alert-success" role="alert">
    <span class="alert-inner--text"><strong>Success: </strong> Login Successful</span>
</div>
                  ';

        header("Location:dashboard.php");
        if ($_SESSION["role"] == "super_user") {
            header("Location:dashboard.php");
        }
        if ($_SESSION["role"] == "admin") {
            header("Location:dashboard-admin.php");
        }
        if ($_SESSION["role"] == "author") {
          header("Location:dashboard-author.php");
      }
    } else {
        print '
                  <div class="alert alert-warning" role="alert">
    <span class="alert-inner--text"><strong>Error: </strong> Invalid Credentials</span>
</div>
                  ';
    }
}

?>
                <form role="form" method="POST" action="index.php">
                  <div class="form-group mb-3">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" name="username" placeholder="User Name" type="text">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" name="password"placeholder="Password" type="password">
                    </div>
                  </div>

                  <div class="text-center">
                    <input type="submit" class="btn btn-primary btn-block myS-4" value="Sign In">
                  </div>
                </form>
              </div>
            </div>
            <div class="row mt-3">

            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


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