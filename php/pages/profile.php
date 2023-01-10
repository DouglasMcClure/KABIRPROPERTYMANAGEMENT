<head>
  <meta charset="utf-8">
  <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?></title>
  <link rel="stylesheet" href="../../css/normalize.css">
  <link rel="stylesheet" href="../../css/main.css">
<!--  <link rel="stylesheet" href="../css/tenant.css">-->
  <!--  <link rel="stylesheet" href="../css/app.css">-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <meta name="theme-color" content="#fafafa">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body class="form">
<?=
require_once "../include/header.php";
?>
  <div class="container mb-lg-2">
    <div class="row">
      <div class="col-lg-12">
        <?php if ($verified == 0): ?>
          <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong class="text-center">Your E-mail is not verified! We've e-mailed you a verification link on your E-mail, check & verify now!</strong>
          </div>
        <?php endif; ?>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="card rounded-0 mt-3 border-primary">
                <div class="card-header border-primary">
                  <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                      <a class="nav-link active" href="#profile" aria-current="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#editProfile" aria-current="tab">Edit Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#changePassword" aria-current="tab">Change Password</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="container active" id="profile">
                      <div class="card-deck">
                        <div class="card border-primary">
                          <div class="card-header bg-primary text-light text-center lead">
                            User ID : <?= $cid; ?>
                          </div>
                          <div class="card-body">
                            <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Name : </b><?= $cname; ?></p>
                            <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>E-Mail : </b><?= $currentEmail; ?></p>
                            <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Gender : </b><?= $cgender; ?></p>
                            <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Date of Birth : </b><?= $cdob; ?></p>
                            <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Phone : </b><?= $cphone; ?></p>
                            <p class="card-text p-2 m-1 rounded" style="border: 1px solid #0275d8;"><b>Registered On : </b><?= $created; ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
require_once "../include/footer.php";
?>
<!-- JavaScript code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="../../js/vendor/modernizr-3.11.2.min.js"></script>
<script src="../../js/plugins.js"></script>
<script src="https://kit.fontawesome.com/39657b55f5.js" crossorigin="anonymous"></script>
</body>
</html>
