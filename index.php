<?php
  include_once("config/database.php");
  session_start();

  // $sql1 = "SELECT * FROM tb_user";
  //   $check1 = $pdo->prepare($sql1);
  //   $check1->execute();
  //   $row1 =$check1->fetchAll(PDO::FETCH_ASSOC); 

  if(isset($_POST['btn_login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM tb_user WHERE username='$username' AND password='$password'";
    $check = $pdo->prepare($sql);
    $check->execute();

    $row = $check->fetch(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // print_r($row1);
    // echo "</pre>";

    if(is_array($row)){
      if($row['username']==$username AND $row['password']==$password AND $row['role']=="admin"){
        //CATCH THE ADMIN SESSION
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        echo $notif = "<div class=\"alert alert-success col-md-12\" style=\"max-width:24%; flex:unset\"> Berhasil Login </div>";
        header('refresh: 2;view/dashboard/admin_dashboard.php');
        // die();
        //CHECK IF ROLE operator
      }elseif($row['username']==$username AND $row['password']==$password AND $row['role']=="operator"){
        echo $notif = "<div class=\"alert alert-denger col-md-12\" style=\"max-width:24%; flex:unset\"> Berhasil Login </div>";
        header('refresh: 2;view/dashboard/operator_dashboard.php');
        // die();
      }
    }else{
      echo $notif = "<div class=\"alert alert-success col-nd-12\" style=\"max-width:24%; flex:unset\">username / password salah </div>";
    }
  }
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukan Username Anda" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Masukan Password Anda" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
       
          <div class="col-14">
            <button type="submit" name="btn_login" class="btn btn-primary btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>