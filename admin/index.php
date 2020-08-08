<?php  
session_start();
error_reporting(0);
require_once '../config/functions.php';

if(!isset($_SESSION['level'])) {
    header("Location: login.php");
    exit;
}

$page = $_GET['p'];

?>
<!-- HEADER -->
<?php require_once 'theme/header.php'; ?>
<!-- /HEADER -->

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">News Dodo</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?= $_SESSION['nama']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="?p=uprofile"><i class="fa fa-user fa-fw"></i> Ubah Profile</a>
                            </li>
                            <li><a href="?p=gpass"><i class="fa fa-key fa-fw"></i> Ganti Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <!-- SIDEBAR -->
                <?php require_once 'theme/sidebar.php'; ?>
                <!-- /SIDEBAR -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                <!-- Judul Halaman -->
                                <?php 
                                if(isset($page)) {
                                    switch ($page) {
                                        case 'user':
                                            echo "Kelola User";
                                            break;

                                        case 'uprofile':
                                            echo "Ubah Profile";
                                            break;

                                        case 'gpass':
                                            echo "Ganti Password";
                                            break;

                                        case 'konfig':
                                            echo "Konfigurasi Situs";
                                            break;
                                        
                                        default:
                                            echo "Beranda";
                                            break;
                                    }
                                } else {
                                    echo "Beranda";
                                }
                                ?>
                                <!-- /Judul Halaman -->
                            </h1>
                            <?= var_dump($_SESSION); ?>
                            <!-- CONTER -->
                            <?php 
                            if(isset($page)) {
                                switch ($page) {
                                    case 'user':
                                        require_once 'page/user/index.php';
                                        break;

                                    case 'huser':
                                        require_once 'page/user/huser.php';
                                        break;

                                    case 'uprofile':
                                        require_once 'page/user/uprofile.php';
                                        break;

                                    case 'gpass':
                                        require_once 'page/user/gpass.php';
                                        break;

                                    case 'konfig':
                                        require_once 'page/konfigurasi/konfig.php';
                                        break;

                                    case 'khapus':
                                        require_once 'page/konfigurasi/khapus.php';
                                        break;
                                    
                                    default:
                                        require_once 'index.php';
                                        break;
                                }
                            } else {
                               require_once 'index.php'; 
                            }
                            ?>
                            <!-- /CONTENT -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<!-- FOOTER -->
<?php require_once 'theme/footer.php'; ?>
<!-- /FOOTER -->
