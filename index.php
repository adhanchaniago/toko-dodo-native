<?php 
require_once 'config/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?= getprofileweb('meta_desc'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= getprofileweb('site_url'); ?></title>

    <!-- Bootstrap -->
    <link href="<?= base_url('admin/') ?>css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body>

<div class="container" style="margin-top: 30px;">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-body">
			    <!-- Navbar -->
			    <nav class="navbar navbar-default">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      
				      <a class="navbar-brand" href="#">Brand</a>
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
				        <?php 
				        $queryKategori = $conn->query("SELECT * FROM kategori WHERE terbit = '1'") or die(mysqli_error($conn));
				        while($rKat = $queryKategori->fetch_assoc()) {
				        	extract($rKat);
				        ?>
				        <li><a href="?katlihat&id=<?= $rKat['id_kategori']; ?>"><?= $nama_kategori; ?></a></li>
				        <?php } ?>
				        
				      </ul>
				      <ul class="nav navbar-nav navbar-right">
					    <form class="navbar-form navbar-left">
					        <div class="form-group">
					          <input type="text" name="keyword" class="form-control" placeholder="Cari">
					        </div>
					        <button type="submit" class="btn btn-default">Submit</button>
					    </form>
					    <li><a href="#">Masuk</a></li>
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</nav>
			    <!-- /Navbar -->
			    <div class="panel panel-default">
				  <div class="panel-body">
				  <!-- HEADER LOGO -->
				  <?php 
				  $queryLogo = $conn->query("SELECT * FROM konfig_situs") or die(mysqli_error($conn));
				  $rLogo = $queryLogo->fetch_assoc();
				  ?>
					<div class="container">
					  	<div class="row">
					  		<div class="col-md-2">
					  			<img src="<?= base_url('img/logo/') . $rLogo['logo_situs']; ?>" width="150">
					  		</div>
					  		<div class="col-md-4">
					  			<div class="page-header">
								  <h3><?= getprofileweb('site_url'); ?> <small><?= getprofileweb('desc'); ?></small></h3>
								</div>
					  		</div>
					  		<div class="col-md-4">
					  			<div class="page-header">
								  <h1>Iklan <small>disini.</small></h1>
								</div>
					  		</div>
					  	</div>
					</div>
					<!-- /HEADER LOGO -->
					<hr>
					<!-- CONTENT -->
					<div class="row">
						<div class="col-md-7">
						<h4 class="text-muted">Berita Terbaru</h4>
							<hr>
						<?php 
						$queryBerita = $conn->query("SELECT * FROM berita WHERE terbit = '1' ORDER BY id_berita DESC LIMIT 0, 5") or die(mysqli_error($conn));
						while($rBerita = $queryBerita->fetch_assoc()) {
							
						
						?>
							<div class="media">
							  <div class="media-left">
							    <a href="?p=detail&id=<?= $rBerita['id_berita']; ?>">
							      <img class="media-object" src="<?= base_url('admin/img/berita/') . $rBerita['foto']; ?>" alt="<?= $rBerita['judul']; ?>" width="200">
							    </a>
							  </div>
							  <div class="media-body">
							    <h4 class="media-heading"><?= $rBerita['judul']; ?></h4>
							    <?= substr(strip_tags($rBerita['isi']), 0,150); ?> ...
							  </div>
							</div>
						<?php } ?>
						</div>
						<!-- SIDEBAR -->
						<div class="col-md-5">
							<h4 class="text-muted">Berita Terpopuler</h4>
							<hr>
							<?php 
							$tgl7 = date('d-F-Y', strtotime('-7 days'));
							$beritaTop = $conn->query("SELECT * FROM berita WHERE terbit = '1' AND tgl >= '$tgl7' ORDER BY id_berita DESC") or die(mysqli_error($conn));
							while($rTop = $beritaTop->fetch_assoc()) {

							
							?>
							<div class="media">
							  <div class="media-left">
							    <a href="?p=detail&id=<?= $rTop['id_berita']; ?>">
							      <img class="media-object" src="<?= base_url('admin/img/berita/'); ?><?= $rTop['foto']; ?>" alt="<?= $rTop['judul']; ?>" width="180">
							    </a>
							  </div>
							  <div class="media-body">
							    <h5 class="media-heading"><?= $rTop['judul']; ?></h5>
							    <small class="text-muted"><?= $rTop['tgl']; ?></small>
							    <?= substr($rTop['isi'], 0, 110); ?> ...
							  </div>
							</div>
							<hr>
						    <?php } ?>
						</div>
						<!-- /SIDEBAR -->
					</div>
					<!-- /CONTENT -->
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url('admin/') ?>js/bootstrap.min.js"></script>
  </body>
</html>