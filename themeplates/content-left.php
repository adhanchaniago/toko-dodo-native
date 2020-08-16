<?php 
if(isset($page)) {
	switch ($page) {
		case 'katlihat':
			require_once 'katlihat.php';
			break;
		case 'detail':
			require_once 'detail.php';
			break;
		default:
			# code...
			break;
	}
} else { ?>
<div class="col-md-7">
<h4 class="text-muted">Berita Terbaru</h4>
		<hr>
	<?php 
	$queryBerita = $conn->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.terbit = '1' ORDER BY id_berita DESC LIMIT 0, 5") or die(mysqli_error($conn));
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
			
		    <a href="?p=katlihat&id=<?= $rBerita['id_kategori']; ?>" class="label label-info"><?= $rBerita['nama_kategori']; ?></a>
		    <?= substr(strip_tags($rBerita['isi']), 0,150); ?> ...
		  </div>
		</div>
	<?php } ?>
</div>

<?php
}
?>