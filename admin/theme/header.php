<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= getprofileweb('meta_desc'); ?>">
    <meta name="author" content="">

    <title>
        <?php  
        if($page) {
            switch ($page) {
                case 'user':
                    echo "Kelola Users";
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
                case 'kategori':
                    echo "Kategori";
                    break;
                case 'berita':
                    echo "Berita";
                    break;
                
                default:
                    echo "Beranda";
                    break;
            }
        } else {
            // echo "Beranda";
            echo "Administrator - " . getprofileweb('site_url');
        }
        ?>        
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('admin/'); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('admin/'); ?>css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('admin/'); ?>css/startmin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('admin/'); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div id="wrapper">