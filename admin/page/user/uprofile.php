<?php 
$id_session = $_SESSION['id'];
$result = $conn->query("SELECT * FROM tb_user WHERE id_user = $id_session") or die(mysqli_error($conn));
$row = $result->fetch_assoc();

if(isset($_POST['ubahprofile'])) {
	if(ubahprofile($_POST) > 0) {
		echo "<script>alert('Berhasil Ubah Profile.');window.location='?p=user';</script>";
	} else {
		echo "<script>alert('Gagal Ubah Profile.');window.location='?p=user';</script>";
	}
}

?>
<form action="" method="post" enctype="multipart/form-data">
	<input type="text" name="id" value="<?= $_SESSION['id']; ?>">
	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="email" id="email" class="form-control" value="<?= $row['email']; ?>" required readonly>
	</div>
	<div class="form-group">
		<label for="nama">Nama Lengkap</label>
		<input type="text" name="nama" id="nama" class="form-control" required value="<?= $row['nama_user']; ?>">
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" class="form-control" required value="<?= $row['password']; ?>">
	</div>
	<div class="form-group">
		<label for="foto">Foto</label><br>
		<input type="text" name="fotoLama" value="<?= $row['foto_user']; ?>">
		<img src="<?= base_url('admin/img/profile/') . $row['foto_user']; ?>" width="100">
		<input type="file" name="foto" id="foto" class="form-control-file">
	</div>
	<div class="form-group">
		<button type="submit" name="ubahprofile" class="btn btn-primary">Ubah</button>
	</div>
</form>