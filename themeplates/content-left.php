<?php 
// pagination
$jmlDataPerhalaman = 5;
$result = $conn->query("SELECT * FROM berita") or die(mysqli_error($conn));
$jmlDataBerita = mysqli_num_rows($result);
// var_dump($jmlDataBerita);
$jmlHalaman = ceil($jmlDataBerita / $jmlDataPerhalaman);
// var_dump($jmlHalaman);
$halamanAktif = $_GET['hal'];
// var_dump($halamanAktif);
// if(isset($_GET['hal'])) {
// 	$halamanAktif = $_GET['hal'];
// } else {
// 	$halamanAktif = 1;
// }
$halamanAktif = ( isset($_GET['hal']) ) ? $_GET['hal'] : 1;
// var_dump($halamanAktif);
$awalData = ($jmlDataPerhalaman * $halamanAktif) - $jmlDataPerhalaman;

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
	$queryBerita = $conn->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori WHERE berita.terbit = '1' ORDER BY id_berita DESC LIMIT $awalData, $jmlDataPerhalaman") or die(mysqli_error($conn));
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

	<?php if($halamanAktif > 1) : ?>
		<!-- <a href="?hal=<?= $halamanAktif - 1; ?>">&laquo;</a> -->
		<ul class="pagination">
		<li><a href="?hal=<?= $halamanAktif - 1; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
		</ul> 
	<?php endif; ?>

	<?php for($i = 1; $i <= $jmlHalaman; $i++) : ?>
		<?php if($i == $halamanAktif) : ?>
			<!-- <a href="?hal=<?= $i; ?>" style="font-weight: bold;color: red;"><?= $i; ?></a> -->
			<ul class="pagination">
				<li class="active"><a href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
			</ul>
		<?php else : ?>
			<!-- <a href="?hal=<?= $i; ?>"><?= $i; ?></a> -->
			<!-- <nav aria-label="..."> -->
			  <ul class="pagination">
			    <!-- <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li> -->
			    <li><a href="?hal=<?= $i; ?>"><?= $i; ?></a></li>
			  </ul>
			<!-- </nav> -->
		<?php endif; ?>
	<?php endfor; ?>

	<?php if($halamanAktif < $jmlHalaman) : ?>
		<ul class="pagination">
		<li><a href="?hal=<?= $halamanAktif + 1; ?>" aria-label="Previous"><span aria-hidden="true">&raquo;</span></a></li>
		</ul> 
	<?php endif; ?>

</div>

<?php
}
?>