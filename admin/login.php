<?php 
session_start(); 
require_once '../config/functions.php';

if(isset($_SESSION['level'])) {
    header("Location: index.php");
    exit;
}

if(isset($_POST['masuk'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars(md5($_POST['password']));

    // cek email ada gk di DB
    $result = $conn->query("SELECT * FROM tb_user WHERE email = '$email' AND password = '$password'") or die(mysqli_error($conn));
    $resultEmail = $conn->query("SELECT * FROM tb_user WHERE email = '$email'") or die(mysqli_error($conn));
    $cekAKun = $resultEmail->fetch_assoc();

    if($result->num_rows >= 1) {
        $row = $result->fetch_assoc();
        $_SESSION['id'] = $row['id_user'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['nama'] = $row['nama_user'];
        $_SESSION['foto'] = $row['foto_user'];
        header("Location: index.php");
        exit;
    } else {
        $error = true;   
    }

    // cek apakah email sudah terdaftar ?
    if($cekAKun === null) {
        $EmailKosong = 1;
        // echo "<script>alert('Akun belum didaftar!');window.location='login.php';</script>";
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Halaman Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('admin/'); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('admin/'); ?>css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('admin/'); ?>css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('admin/'); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administrator Portal Berita Do</h3>
                    </div>
                    <div class="panel-body">
                    <?php if(isset($error)) : ?>
                        <div class="alert alert-danger">
                            <b>Password</b> anda salah, coba lagi.</a>.
                        </div>
                    <?php endif; ?>
                    <!-- Heri web -->
                    <?php if(isset($EmailKosong)) : ?>
                        <div class="alert alert-danger">
                            <b>Akun tidak terdaftar</b>, buat akun dulu.</a>.
                        </div>
                    <?php endif; ?>
                        <form role="form" action="" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="masuk" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('admin/'); ?>js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url('admin/'); ?>js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('admin/'); ?>js/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('admin/'); ?>js/startmin.js"></script>

</body>
</html>
