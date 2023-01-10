<?php

session_start();
require_once 'auth.php';
$currentUser = new Auth();

if(!isset($_SESSION['user'])){
  header("Location: ../../../KPM/php/");
  die;
}

$currentEmail = $_SESSION['user'];

$data = $currentUser->currentUser($currentEmail);

$cid = $data['id'];
$cname = $data['name'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cgender = $data['gender'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$created = $data['created_at'];
$verified = $data['verified'];

$fname = strtok($cname, " ");
