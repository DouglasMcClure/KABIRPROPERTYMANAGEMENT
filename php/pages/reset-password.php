<?php
require_once '../include/auth.php';

$user = new Auth();

$msg = '';

if (isset($_GET['email']) && isset($_GET['token'])){
  $email = $user->test_input($_GET['email']);
  $token = $user->test_input($_GET['token']);

  $auth_user = $user->reset_pass_auth($email, $token);

  if ($auth_user != null){
    if (isset($_POST['submit'])){
      $newpass = $_POST['pass'];
      $cnewpass = $_POST['cpass'];

      $hnewpass = password_hash($newpass, PASSWORD_DEFAULT);

      if($newpass == $cnewpass){
        $user->update_new_pass($hnewpass, $email);
        $msg = 'Password Changed Successfully!<br><a href="../../php/index.php">Login Here!</a>';
      }
      else{
        $msg = 'Password did not match!';
      }
    }
  }
  else{
    header('Location: ../../php/index.php');
    exit();
  }
}else{
  header('Location: ../../php/index.php');
  exit();
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link rel="stylesheet" href="../../php/css/user-system.css">
  <link rel="stylesheet" href="../../../KPM/css/normalize.css">
  <link rel="stylesheet" href="../../../KPM/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <meta name="theme-color" content="#fafafa">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="bg-info form">

  <!-- Navbar Section -->
  <section id="navigation">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <a href="../../index.html" class="navbar-brand">
              <!-- Logo Image -->
              <img src="../../img/logo.png" width="100" height="100" alt="" class="d-inline-block align-middle mr-2 logo">
            </a>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <div class="container">
  <!-- Login Form Start -->
  <div class="row justify-content-center wrapper" id="login-box">
    <div class="col-lg-10 my-auto myShadow">
      <div class="row">
        <div class="col-lg-7 bg-white p-4">
          <h1 class="text-center font-weight-bold text-primary">Reset Password In Your Account</h1>
          <hr class="my-3" />
          <form action="#" method="post" class="px-3" id="login-form">
            <div class="text-center lead my-2"><?= $msg; ?></div>
            <div class="input-group input-group-lg form-group">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="fas fa-key fa-lg fa-fw"></i></span>
              </div>
              <input type="password" name="pass" class="form-control rounded-0" placeholder="New Password" required minlength="5"  autocomplete="off"/>
            </div>
            <div class="input-group input-group-lg form-group py-3">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="fas fa-key fa-lg fa-fw"></i></span>
              </div>
              <input type="password" name="cpass" class="form-control rounded-0" placeholder="Confirm New Password" required minlength="5"  autocomplete="off"/>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
            </div>
          </form>
        </div>
        <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
          <h1 class="text-center font-weight-bold text-white">Reset Your Password Here!</h1>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Form End -->
  </div>
  <!--Footer Section -->
  <div class="footer-dark">
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-3 item">
            <h3>Services</h3>
            <ul>
              <li><a href="#">Tenant Screening</a></li>
              <li><a href="#">Rent Collection</a></li>
              <li><a href="#">24/7 Maintenance</a></li>
              <li><a href="#">Code Compliance</a></li>
              <li><a href="#">Financials</a></li>
              <li><a href="#">Evictions</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-md-3 item">
            <h3>About</h3>
            <ul>
              <li><a href="#">Company</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">Careers</a></li>
            </ul>
          </div>
          <div class="col-md-6 item text">
            <h3>Kabir Property Management</h3>
            <p>Praesent sed lobortis mi. Suspendisse vel placerat ligula. Vivamus ac sem lacus. Ut vehicula rhoncus elementum. Etiam quis tristique lectus. Aliquam in arcu eget velit pulvinar dictum vel in justo.</p>
          </div>
          <div class="col item social"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-instagram"></i></a><a href="#"><i class="fab fa-tiktok"></i></a></div>
        </div>
        <p class="copyright">KabirPropertyManagement © 2023</p>
      </div>
    </footer>
  </div>
  <!-- JavaScript code -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/39657b55f5.js" crossorigin="anonymous"></script>
  <script src="../../../KPM/js/vendor/modernizr-3.11.2.min.js"></script>
</body>
</html>
