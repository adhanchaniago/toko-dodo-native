<?php  
$id_berita = $_GET['id'];
$detailBerita = $conn->query("SELECT * FROM berita WHERE id_berita = $id_berita") or die(mysqli_error($conn));
$pecahB = $detailBerita->fetch_assoc();

?>
<div class="col-md-7">
	<h3><?= $pecahB['judul']; ?></h3>
	<img src="admin/img/berita/<?= $pecahB['foto']; ?>" alt="" class="img-thumbnail">
	<small class="muted">Penulis <?= $pecahB['updateby'] . " ". $pecahB['tgl']; ?></small><hr>
	<p><?= $pecahB['isi']; ?></p>
</div>