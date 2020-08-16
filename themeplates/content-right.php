

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
    <!-- Kontak -->
    <h4 class="text-muted">Kontak Kami</h4>
	<hr>
	<p><?= getprofileweb('alamat') . " | " .  getprofileweb('email'); ?></p>
	<!-- /Kontak -->
</div>
