<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?></title>
  <link rel="stylesheet" href="../../css/normalize.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="../css/tenant.css">
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
<!-- Verify Email -->
<div class="container">
  <div class="row mb-lg-2">
    <div class="col-lg-12">
      <?php if ($verified == 0): ?>
        <div class="alert alert-danger alert-dismissible text-center mt-2 m-0">
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
          <strong class="text-center">Your E-mail is not verified! We've e-mailed you a verification link on your E-mail, check & verify now!</strong>
        </div>
      <?php endif; ?>
    </div>
  </div>
  <div>
  </div>
</div>
<div class="container-fluid">
  <div class="col p-3 d-flex flex-column justify-content-center">
  <div class="py-3">
    <div class="col d-flex flex-column justify-content-center myColor p-4">
      <div class="row py-3">
        <h1 class="text-center font-weight-bold text-light">Lease Information</h1>
        <hr class="my-2 px-0 align-content-center" style="color: #f0f9ff" />
      </div>
      <div class="card border-light" style="height: 600px; width: 600px;">
        <div class="card-body">
          <div class="table-responsive" id="showOrder">
            <table class="table table-striped text-center">
              <thead>
              <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Location</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>Leak</td>
                <td>115 Jericho Road</td>
                <td><img src="../img/slide2.jpg" style="height: 100px; width: 100px;"></td>
                <td>
                  <a href="#" title="View Details" class="text-success infoBtn">
                    <i class="fa-sharp fa-solid fa-circle-info fa-lg"></i>
                  </a>&nbsp;
                  <a href="#" title="Edit Note" class="text-primary editBtn">
                    <i class="fa-sharp fa-solid fa-pen-to-square fa-lg"></i>
                  </a>&nbsp;
                  <a href="#" title="Delete Note" class="text-danger deleteBtn">
                    <i class="fa-sharp fa-solid fa-trash fa-lg"></i>
                  </a>&nbsp;
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Leak</td>
                <td>115 Jericho Road</td>
                <td><img src="../img/slide2.jpg" style="height: 100px; width: 100px;"></td>
                <td>
                  <a href="#" title="View Details" class="text-success infoBtn">
                    <i class="fa-sharp fa-solid fa-circle-info fa-lg"></i>
                  </a>&nbsp;
                  <a href="#" title="Edit Note" class="text-primary editBtn">
                    <i class="fa-sharp fa-solid fa-pen-to-square fa-lg"></i>
                  </a>&nbsp;
                  <a href="#" title="Delete Note" class="text-danger deleteBtn">
                    <i class="fa-sharp fa-solid fa-trash fa-lg"></i>
                  </a>&nbsp;
                </td>
              </tr>
              <tr>
                <td>1</td>
                <td>Leak</td>
                <td>115 Jericho Road</td>
                <td><img src="../img/slide2.jpg" style="height: 100px; width: 100px;"></td>
                <td>
                  <a href="#" title="View Details" class="text-success infoBtn">
                    <i class="fa-sharp fa-solid fa-circle-info fa-lg"></i>
                  </a>&nbsp;
                  <a href="#" title="Edit Note" class="text-primary editBtn">
                    <i class="fa-sharp fa-solid fa-pen-to-square fa-lg"></i>
                  </a>&nbsp;
                  <a href="#" title="Delete Note" class="text-danger deleteBtn">
                    <i class="fa-sharp fa-solid fa-trash fa-lg"></i>
                  </a>&nbsp;
                </td>
              </tr>
              </tbody>
            </table>
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
</body>
<!-- JavaScript code -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="../../js/vendor/modernizr-3.11.2.min.js"></script>
<script src="../../js/plugins.js"></script>
<script src="https://kit.fontawesome.com/39657b55f5.js" crossorigin="anonymous"></script>
