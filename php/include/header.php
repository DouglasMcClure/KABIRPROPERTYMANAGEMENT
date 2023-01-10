<?php
require_once '../include/session.php';
?>
<!-- Navbar Section -->
  <header class="py-lg-4" id="navigation">
    <nav class="navbar navbar-expand-lg bg-light fixed-top">
      <div class="container-fluid">
        <a href="../pages/home.php" class="navbar-brand">
<!--           Logo Image -->
          <img src="../../img/logo.png" width="50" height="50" alt="" class="d-inline-block align-middle mr-2">
<!--           Logo Text -->
          <span class="text-uppercase font-weight-bold">KABIR PROPERTY MANAGEMENT</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link top-nav <?= (basename($_SERVER['PHP_SELF']) == "home.php")?"active":""; ?>" aria-current="page" href="../pages/home.php"><i class="fas fa-home"></i>&nbsp;Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link top-nav <?= (basename($_SERVER['PHP_SELF']) == "profile.php")?"active":""; ?>" href="../pages/profile.php"><i class="fas fa-user-circle"></i>&nbsp;Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link top-nav <?= (basename($_SERVER['PHP_SELF']) == "notification.php")?"active":""; ?>" href="../pages/notification.php"><i class="fas fa-bell"></i>&nbsp;Notifications</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-cog"></i>&nbsp;Hi! <?= $fname; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="../pages/workorder.php"><i class="fa-solid fa-screwdriver-wrench"></i>&nbsp;Work Orders</a></li>
                <li><a class="dropdown-item" href="../pages/feedback.php"><i class="fas fa-comment-dots"></i>&nbsp;Feedback</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-calendar-days"></i>&nbsp;Calender</a></li>
                <li><a class="dropdown-item" href="../pages/lease.php"><i class="fa-solid fa-file-pen"></i></i>&nbsp;Lease</a></li>
                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear"></i>&nbsp;Settings</a></li>
                <li><a class="dropdown-item" href="../include/logout.php"><i class="fa-solid fa-right-to-bracket"></i>&nbsp;Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
