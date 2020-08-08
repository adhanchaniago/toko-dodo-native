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

if(isset($_POST['tambah'])) {
	if(tambahKonfig($_POST) > 0) {
		echo "<script>alert('Konfigurasi berhasil ditambahkan.');window.location='?p=konfig';</script>";
	} else {
		echo "<script>alert('Konfigurasi gagal ditambahkan.');window.location='?p=konfig';</script>";
	}
}

if(isset($_POST['editkonfig'])) {
	if(editKonfig($_POST) > 0) {
		echo "<script>alert('Konfigurasi berhasil diedit.');window.location='?p=konfig';</script>";
	} else {
		echo "<script>alert('Konfigurasi gagal diedit.');window.location='?p=konfig';</script>";
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

<legend>Tambah Konfigurasi</legend>
<div class="panel panel-default">
<div class="row">
	<form action="" method="post">
	<div class="col-md-3">
	  	<div class="panel-body">
		    <div class="well">
		    <label for="nama">Nama</label>
		    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Situs">
			</div>
			<div class="form-group">
				<button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
			</div>
	  	</div>
	</div>
	<div class="col-md-3">
	  	<div class="panel-body">
		    <div class="well">
		    <label for="tax">Tax</label>
		    <input type="text" name="tax" id="tax" class="form-control" placeholder="Nama Situs">
			</div>
	  	</div>
	</div>
	<div class="col-md-3">
	  	<div class="panel-body">
		    <div class="well">
		    <label for="isi">Isi</label>
		    <input type="text" name="isi" id="isi" class="form-control" placeholder="Nama Situs">
			</div>
	  	</div>
	</div>
	<div class="col-md-3">
	  	<div class="panel-body">
		    <div class="well">
		    <label for="link">Link</label>
		    <input type="text" name="link" id="link" class="form-control" placeholder="Nama Situs">
			</div>
	  	</div>
	</div>	
	</form>
</div>
	
</div>


<legend>Daftar Konfigurasi</legend>
<div class="panel panel-default">
	<form action="" method="post">
		<div class="panel-body">
			<?php 
			$hasil = $conn->query("SELECT * FROM konfigurasi WHERE tipe = 'konfigurasi'") or die(mysqli_error($conn));
			while($row = $hasil->fetch_assoc()) {
				// menggambil semua filed DB & menjadikan dengan variabel
				extract($row);
			?>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="hidden" name="id[]" value="<?= $id_kon; ?>">
						<input type="text" name="nama[]" id="nama" value="<?= $nama; ?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="tax">Tax</label>
						<input type="text" name="tax[]" id="tax" value="<?= $tax; ?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="isi">Isi</label>
						<input type="text" name="isi[]" id="isi" value="<?= $isi; ?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<a href="?p=khapus&id=<?= $id_kon; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
						<label for="link">Link</label>
						<input type="text" name="link[]" id="link" value="<?= $link; ?>" class="form-control">
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="form-group">
				<button type="submit" name="editkonfig" class="btn btn-primary">Edit</button>
			</div>
		</form>
	</div>
</div>