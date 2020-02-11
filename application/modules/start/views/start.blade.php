<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YAYAYSAN SINAI INDONESIA| Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{base_url('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{base_url('assets/dist/css/adminlte.min.cs')}}s">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img src="{{base_url('assets/dist/img/Teladan.png')}}" alt="Yayasan Sinai Indonesia"></img>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">{{$this->session->flashdata('message');}}</p>

      <form action="{{base_url('start/auth/')}}" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          
          
            <button type="submit" name="submit" class="btn btn-success btn-block">Sign In</button>
          
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="{{base_url('user')}}" class="btn btn-block btn-primary">
          <i class="fas fa-users"></i> Tampil Sebagai User
        </a>
      </div>

      <p class="mb-1">
        <a href="forgot-password.html"> forgot Your Password?</a>
      </p>
    </div>
  </div>
</div>

<script src="{{base_url('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{base_url('assets/dist/js/adminlte.min.js')}}"></script>

</body>
</html>
