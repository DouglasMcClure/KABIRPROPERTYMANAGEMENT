<?php
session_start();
if (isset($_SESSION['user'])){
  header("Location: ../../../KPM/php/pages/home.php");
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
  <link rel="stylesheet" href="css/user-system.css">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <meta name="theme-color" content="#fafafa">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body class="form">
<!-- Navbar Section -->
  <section id="navigation">
    <nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mx-auto">
            <a href="../index.html" class="navbar-brand">
              <!-- Logo Image -->
              <img src="../img/logo.png" width="100" height="100" alt="" class="d-inline-block align-middle mr-2 logo">
            </a>
          </ul>
        </div>
      </div>
    </nav>
  </section>

  <!-- Forms -->
  <div class="container">
  <!-- Login Form -->
  <div class="row justify-content-center wrapper" id="login-box">
    <div class="col-lg-10 my-auto myShadow">
      <div class="row">
        <div class="col-lg-7 bg-white p-4">
          <h1 class="text-center font-weight-bold text-dark">Sign in to Account</h1>
          <hr class="my-3" />
          <form action="#" method="post" class="px-3" id="login-form">
            <div id="loginAlert"></div>
            <div class="input-group input-group-lg form-group py-3">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="far fa-envelope fa-lg fa-fw"></i></span>
              </div>
              <input type="email" id="email" name="email" class="form-control rounded-0" placeholder="E-Mail" required value="<?php if (isset($_COOKIE['email'])) {echo $_COOKIE['email'];}?>"/>
            </div>
            <div class="input-group input-group-lg form-group">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="fas fa-key fa-lg fa-fw"></i></span>
              </div>
              <input type="password" id="password" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required value="<?php if (isset($_COOKIE['password'])) {echo $_COOKIE['password'];} ?>" autocomplete="off" />
            </div>
            <div class="form-group clearfix py-2">
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="inlineFormCheck" name="rem" <?php if (isset($_COOKIE['email'])){ ?> checked <?php } ?>>
                  <label class="form-check-label" for="inlineFormCheck">
                    Remember me
                  </label>
                  <div class="forgot float-end">
                    <a class="text-dark" href="#" id="forgot-link" style="text-decoration: none">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" id="login-btn" value="Sign In" class="btn btn-warning btn-lg btn-block myBtn" />
            </div>
          </form>
        </div>
        <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
          <h1 class="text-center font-weight-bold text-white">Hello Friends!</h1>
          <hr class="my-3 bg-light myHr" />
          <p class="text-center font-weight-bolder text-light lead">Enter your personal details and start your journey with us!</p>
          <button class="btn btn-outline-warning btn-lg align-self-center font-weight-bolder mt-4 myLinkBtn" id="register-link">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Registration Form -->
  <div class="row justify-content-center wrapper" id="register-box" style="display: none;">
    <div class="col-lg-10 my-auto myShadow">
      <div class="row">
        <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
          <h1 class="text-center font-weight-bold text-white">Welcome Back!</h1>
          <hr class="my-4 bg-light myHr" />
          <p class="text-center font-weight-bolder text-light lead">To keep connected with us please login with your personal info.</p>
          <button class="btn btn-outline-warning btn-lg font-weight-bolder mt-4 align-self-center myLinkBtn" id="login-link">Sign In</button>
        </div>
        <div class="col-lg-7 bg-white p-4">
          <h1 class="text-center font-weight-bold text-primary">Create Account</h1>
          <hr class="my-3" />
          <form action="#" method="post" class="px-3" id="register-form">
            <div id="regAlert"></div>
            <div class="input-group input-group-lg form-group">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="far fa-user fa-lg fa-fw"></i></span>
              </div>
              <input type="text" id="name" name="name" class="form-control rounded-0" placeholder="Full Name" required />
            </div>
            <div class="input-group input-group-lg form-group py-3">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="far fa-envelope fa-lg fa-fw"></i></span>
              </div>
              <input type="email" id="remail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
            </div>
            <div class="input-group input-group-lg form-group">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="fas fa-key fa-lg fa-fw"></i></span>
              </div>
              <input type="password" id="rpassword" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required />
            </div>
            <div class="input-group input-group-lg form-group py-3">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="fas fa-key fa-lg fa-fw"></i></span>
              </div>
              <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="5" placeholder="Confirm Password" required />
            </div>
            <div class="form-group">
              <div id="passError" class="text-danger font-weight-bolder"></div>
            </div>
            <div class="form-group">
              <input type="submit" id="register-btn" value="Sign Up" class="btn btn-warning btn-lg btn-block myBtn" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Forgot Password Form -->
  <div class="row justify-content-center wrapper" id="forgot-box" style="display: none;">
    <div class="col-lg-10 my-auto myShadow">
      <div class="row">
        <div class="col-lg-7 bg-white p-4">
          <h1 class="text-center font-weight-bold text-primary">Forgot Your Password?</h1>
          <hr class="my-3" />
          <p class="lead text-center text-secondary">To reset your password, enter the registered e-mail adddress and we will send you password reset instructions on your e-mail!</p>
          <form action="#" method="post" class="px-3" id="forgot-form">
            <div id="forgotAlert"></div>
            <div class="input-group input-group-lg form-group py-3">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon"><i class="far fa-envelope fa-lg"></i></span>
              </div>
              <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
            </div>
            <div class="form-group">
              <input type="submit" id="forgot-btn" value="Reset Password" class="btn btn-warning btn-lg btn-block myBtn" />
            </div>
          </form>
        </div>
        <div class="col-lg-5 d-flex flex-column justify-content-center myColor p-4">
          <h1 class="text-center font-weight-bold text-white">Reset Password!</h1>
          <hr class="my-4 bg-light myHr" />
          <button class="btn btn-outline-warning btn-lg font-weight-bolder myLinkBtn align-self-center" id="back-link">Back</button>
        </div>
      </div>
    </div>
  </div>
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
<script src="../js/vendor/modernizr-3.11.2.min.js"></script>
<script src="../php/js/script.js"></script>
</body>
</html>
