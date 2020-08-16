<?php require_once 'themeplates/header.php'; ?>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-body">
			    <!-- Navbar -->
			    <?php require_once 'themeplates/navbar.php'; ?>
			    <!-- /Navbar -->
			    <div class="panel panel-default">
				  <div class="panel-body">
				  <!-- HEADER LOGO -->
				  <?php require_once 'themeplates/logo.php'; ?>
					<!-- /HEADER LOGO -->
					<hr>
					<!-- CONTENT -->
					<div class="row">
						<!-- BERITA TERBARU -->
						<?php 
						if(isset($_POST['cari'])) {
							$keyword = $_POST['keyword'];
							$data = $conn->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.judul LIKE '%".$keyword. "%'") or die(mysqli_error($conn));
						} else {
							$data = $conn->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.terbit = '1' ORDER BY id_berita DESC LIMIT 0, 5") or die(mysqli_error($conn));
						}
						?>
						<div class="col-md-7">
						<?php while($d = $data->fetch_assoc()) { ?>
						<div class="media">
						  <div class="media-left">

						    <a href="./?p=detail&id=<?= $d['id_berita']; ?>">
						      <img class="media-object" src="<?= base_url('admin/img/berita/') . $d['foto']; ?>" alt="<?= $d['judul']; ?>" width="200">
						    </a>
						  </div>
						  <div class="media-body">
						    <h4 class="media-heading"><?= $d['judul']; ?></h4> 
							
						    <a href="?p=katlihat&id=<?= $d['id_kategori']; ?>" class="label label-info"><?= $d['nama_kategori']; ?></a>
						    <?= substr(strip_tags($d['isi']), 0,150); ?> ...
						  </div>
						</div>
						<?php } ?>
						</div>
						<!-- SIDEBAR -->
						<?php require_once 'themeplates/content-right.php'; ?>
						<!-- /SIDEBAR -->
					</div>
					<!-- /CONTENT -->
				  </div>

				<!-- LIST FOOTER -->
				<?php 
				$AllKate = $conn->query("SELECT * FROM kategori ORDER BY id_kategori DESC LIMIT 0, 4") or die(mysqli_error($conn));
				?>
				<div class="container-fluid" style="background: #eee;">
					<div class="row">
						<div class="col-md-4">
							<h4 class="text-muted">Kategori</h4>
							<div class="list-group">
							<?php while($rkate = $AllKate->fetch_assoc()) { ?>
							  <a href="?p=katlihat&id=<?= $rkate['id_kategori']; ?>" class="list-group-item">
							    <?= $rkate['nama_kategori']; ?>
							  </a>
							<?php } ?>
							</div>
						</div>
						<div class="col-md-4">
							<h4 class="text-muted">Berita Populer</h4>
							<ul class="list-group">
							<?php 
							$tgl7 = date('d-F-Y', strtotime('-7 days'));
							$AllBeri = $conn->query("SELECT * FROM berita WHERE terbit = '1' AND tgl >= '$tgl7' ORDER BY id_berita DESC") or die(mysqli_error($conn));
							while($pecahBeri = $AllBeri->fetch_assoc()) {
							?>
							  <li class="list-group-item"><a href="?p=detail&id=<?= $pecahBeri['id_berita']; ?>"><?= $pecahBeri['judul']; ?></a></li>
							<?php } ?>
							</ul>
						</div>
						<div class="col-md-4">
							<h4 class="text-muted">Kontak</h4>
							<div class="input-group">
							  <span class="input-group-addon" id="sizing-addon2"><i class="glyphicon glyphicon-envelope"></i></span>
							  <input type="email" class="form-control" placeholder="Email Anda">
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-edit"></i></span>
							  <input type="text" class="form-control" placeholder="Nama Lengkap">
							</div>
							<div class="form-group">
								<textarea name="pesan" id="pesan" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary">Kirim</button>
							</div>
						</div>
					</div>
				</div>
				<!-- /LIST FOOTER -->
				</div>
<?php require_once 'themeplates/footer.php'; ?>