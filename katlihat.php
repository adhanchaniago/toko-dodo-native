<?php 
$id = $_GET['id'];

$reKat = $conn->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.id_kategori = $id") or die(mysqli_error($conn));
// $rJudul = $reKat->fetch_assoc();


?>
<div class="col-md-7">
	<?php while($rKate = $reKat->fetch_assoc()) { ?>
	<hr>
	<div class="media">
		  <div class="media-left">

		    <a href="?p=detail&id=<?= $rKate['id_berita']; ?>">
		      <img class="media-object" src="<?= base_url('admin/img/berita/') . $rKate['foto']; ?>" alt="<?= $rKate['judul']; ?>" width="200">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading"><?= $rKate['judul']; ?></h4> 
			
		    <a href="?p=katlihat&id=<?= $rKate['id_kategori']; ?>" class="label label-info"><?= $rKate['nama_kategori']; ?></a>
		    <?= substr(strip_tags($rKate['isi']), 0,150); ?> ...
		  </div>
		</div>
	<?php } ?>
</div>
