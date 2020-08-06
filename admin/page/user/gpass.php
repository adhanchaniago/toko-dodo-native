<?php
if(isset($_POST['gantipass'])) {
	if(gantipass($_POST) > 0) {
		echo "<script>alert('Berhasil Ganti Password.');window.location='?p=user';</script>";
	} else {
		echo "<script>alert('Gagal Ganti Password.');window.location='?p=user';</script>";
	}
}

?>

<form action="" method="post">
	<input type="text" name="id" value="<?= $_SESSION['id']; ?>">
	<div class="form-group">
		<label for="passlama">Password Lama</label>
		<input type="password" name="passlama" id="passlama" class="form-control">
	</div>
	<div class="form-group">
		<label for="passbaru1">Password Baru</label>
		<input type="password" name="passbaru1" id="passbaru1" class="form-control">
	</div>
	<div class="form-group">
		<label for="passbaru2">Konfirmasi Password</label>
		<input type="password" name="passbaru2" id="passbaru2" class="form-control">
	</div>
	<div class="form-group">
		<button type="submit" name="gantipass" class="btn btn-primary">Ganti</button>
	</div>
</form>