<?php 
$id = $_SESSION['id'];
$tampilLogo = $conn->query("SELECT * FROM konfig_situs WHERE id_konfig = $id") or die(mysqli_error($conn));
$pecahLogo = $tampilLogo->fetch_assoc();

if(isset($_POST['uploadLogo'])) {
	if(uploadLogo($_POST) > 0) {
		echo "<script>alert('Berhasil Upload Logo Situs.');window.location='?p=konfig';</script>";
	} else {
		echo "<script>alert('Gagal Upload Logo Situs.');window.location='?p=konfig';</script>";
	}
}

if(isset($_POST['uploadIcon'])) {
	if(uploadIcon($_POST) > 0) {
		echo "<script>alert('Berhasil Upload Icon Situs.');window.location='?p=konfig';</script>";
	} else {
		echo "<script>alert('Gagal Upload Icon Situs.');window.location='?p=konfig';</script>";
	}
}

?>
<div class="row">
	<div class="col-md-6">
		<div class="well">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="media">
				  <div class="media-left">
				      <img class="media-object" src="<?= base_url('img/logo/') . $pecahLogo['logo_situs']; ?>" width="100">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading">Upload Logo</h4>
				    <input type="hidden" name="uploadLogoLama" value="<?= $pecahLogo['logo_situs']; ?>">
				    <input type="file" name="uploadLogo" class="form-control-file"><br>
				    <button class="btn btn-primary" name="uploadLogo">Upload Logo</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-6">
		<div class="well">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="media">
				  <div class="media-left">
				      <img class="media-object" src="<?= base_url('img/logo/') . $pecahLogo['logo_icon']; ?>" width="100">
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading">Upload Icon</h4>
				    <input type="hidden" name="uploadIconLama" value="<?= $pecahLogo['logo_situs']; ?>">
				    <input type="file" name="uploadIcon" class="form-control-file"><br>
				    <button class="btn btn-primary" name="uploadIcon">Upload Icon</button>
				  </div>
				</div>
			</form>
		</div>
	</div>
</div>