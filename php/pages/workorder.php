<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title><?= ucfirst(basename($_SERVER['PHP_SELF'], '.php')); ?></title>
  <link rel="stylesheet" href="../../css/normalize.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="../css/tenant.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <meta name="theme-color" content="#fafafa">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="../include/DataTables/datatables.css">
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
<div class="col d-flex flex-column justify-content-center myColor px-3">
  <div class="row mx-0 py-3">
    <h1 class="text-center font-weight-bold text-light">Work Orders</h1>
    <hr class="my-0 px-2 align-content-center" style="color: #f0f9ff" />
    <a href="#" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newOrderModal">
      <i class="fas fa-plus-circle fa-lg"></i> Create New Work Order
    </a>
  </div>
  <div class="card border-light">
    <div class="card-body">
      <div class="table-responsive" id="showOrder"></div>
    </div>
  </div>

  <!-- Modal -->
<!-- New Work Order -->
  <div class="modal fade center" id="newOrderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newOrderModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="newWorkOrderLabel">New Work Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="post" class="px-3" id="new-work-order-form">
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
            <div class="input-group input-group-sm form-group py-3">
              <div class="input-group-prepend">
              <span class="input-group-text rounded-0 icon justify-content-center py-3"><i class="fa-sharp fa-solid fa-circle-info"></i></span>
              </div>
              <input id="subject" name="subject" class="form-control rounded-0" placeholder="Subject" required />
            </div>
            <div class="input-group input-group-sm form-group py-3">
              <textarea id="details" name="details" class="form-control rounded-0" placeholder="Details" rows="6" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="sendWorkOrderBtn" class="btn btn-warning">Send Work Order</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<!-- Edit Work Order -->
  <div class="modal fade" id="editOrderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editOrderModal" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="editWorkOrderModalLabel">Edit Work Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="post" class="px-3" id="edit-work-order-form">
          <div class="modal-body">
            <input type="hidden" name="editId" id="editId">
            <div class="input-group input-group-sm form-group py-3">
              <div class="input-group-prepend">
                <span class="input-group-text rounded-0 icon justify-content-center py-3"><i class="fa-sharp fa-solid fa-circle-info"></i></span>
              </div>
              <input id="editSubject" name="subject" class="form-control rounded-0" placeholder="Subject" required />
            </div>
            <div class="input-group input-group-sm form-group py-3">
              <textarea id="editDetails" name="details" class="form-control rounded-0" placeholder="Details" rows="6" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="editWorkOrderBtn" class="btn btn-warning">Edit Work Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
require_once "../include/footer.php";
?>
<!-- JavaScript code -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../include/DataTables/datatables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/js/bootstrap.bundle.min.js" integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<script src="../../js/vendor/modernizr-3.11.2.min.js"></script>
<script src="../../js/plugins.js"></script>
<script src="../js/work_order.js"></script>
<script src="https://kit.fontawesome.com/39657b55f5.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
