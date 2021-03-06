<?php
$conn = new mysqli("localhost", "root", "", "tokododo") or die(mysqli_error($conn));

function base_url($url = null)
{
	$base_url = "http://localhost/toko-dodo-native/";
	if($url != null) {
		return $base_url . $url;
	} else {
		return $base_url;
	}
}

// --------------USER------------------------ 
function tambahuser($data)
{
	global $conn;
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$password = htmlspecialchars(md5($data['password']));

	// cek email udh ada di DB bulum ?
	$result = $conn->query("SELECT email FROM tb_user WHERE email = '$email'") or die(mysqli_error($conn));
	if($result->num_rows === 1) {
		echo "<script>alert('Email sudah terdaftar.')</script>";
		return false;
	}

	// cek gambar
	$fotoName = $_FILES['foto']['name'];
	$tmpName = $_FILES['foto']['tmp_name'];
	$FotoSize = $_FILES['foto']['size'];
	$FotoError = $_FILES['foto']['error'];

	if($FotoError == 4) {
		// echo "<script>alert('Pilih gambar terlebih dahulu.')</script>";
		$conn->query("INSERT INTO tb_user VALUES (null, '$email', '$nama', '$password', '2', 'default.jpg') ") or die(mysqli_error($conn));
		return false;
	}

	$ektensiValid = ['jpg', 'png'];
	$ektensiFoto = explode('.', $fotoName);
	$ektensiFoto = strtolower(end($ektensiFoto));

	// if(!in_array($ektensiFoto, $ektensiValid)) {
	// 	echo "<script>alert('Foto wajib format jpg/png.')</script>";
	// 	return false;
	// }

	if($FotoSize > 1000000) {
		echo "<script>alert('Ukuran foto harus dibawah 1MB.')</script>";
		return false;
	}

	// acak nama foto
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpName, '../admin/img/profile/' . $namaFileBaru);



	$sql = $conn->query("INSERT INTO tb_user VALUES (null, '$email', '$nama', '$password', '2', '$namaFileBaru') ") or die(mysqli_error($conn));
	return $namaFileBaru;
	return $conn->affected_rows;
}

function uploadFotoUser()
{
	$namaFoto = $_FILES['foto']['name'];
	$errorFoto = $_FILES['foto']['error'];
	$sizeFoto = $_FILES['foto']['size'];
	$tmpFoto = $_FILES['foto']['tmp_name'];

	$ektensiValid = ['jpg','png'];
	$ektensiFoto = explode('.', $namaFoto);
	$ektensiFoto = strtolower(end($ektensiFoto));

	if(!in_array($ektensiFoto, $ektensiValid)) {
		echo "<script>alert('Format foto harus jpg/png.')</script>";
		return false;
	}

	if($sizeFoto > 1000000) {
		echo "<script>alert('Ukuran foto terlalu besar, max 1MB.')</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	// $fotoLama = $_POST['fotoLama'];
	// if($fotoLama != 'default.jpg')) {
	// 	unlink('./admin/img/profile/' . $fotoLama);
	// }

	move_uploaded_file($tmpFoto, '../admin/img/profile/' . $namaFileBaru);
	return $namaFileBaru;
}

function ubahuser($data)
{
	global $conn;
	$id = htmlspecialchars($data['id']);
	$nama = htmlspecialchars($data['nama']);
	$email = htmlspecialchars($data['email']);
	$password = htmlspecialchars(md5($data['password']));
	$fotoLama = htmlspecialchars($data['fotoLama']);

	// cek foto 
	if($_FILES['foto']['error'] === 4) {
		$foto = $fotoLama;
	} else {
		$foto = uploadFotoUser();
	}

	$conn->query("UPDATE tb_user SET email = '$email', nama_user = '$nama', password = '$password', foto_user = '$foto' WHERE id_user = $id") or die(mysqli_error($conn));
	return $conn->affected_rows;
}

function ubahprofile($data)
{
	global $conn;
	$id = htmlspecialchars($data['id']);
	$email = htmlspecialchars($data['email']);
	$nama = htmlspecialchars($data['nama']);
	$password = htmlspecialchars($data['password']);
	$fotoLama = htmlspecialchars($data['fotoLama']);

	// cek foto
	if($_FILES['foto']['error'] === 4) {
		$foto = $fotoLama;
	} else {
		$foto = profileUbah();
	}

	$sql = $conn->query("UPDATE tb_user SET email = '$email', nama_user = '$nama', password = '$password', foto_user = '$foto' WHERE id_user = $id") or die(mysqli_error($conn));
	return $conn->affected_rows;
}

function profileUbah()
{
	$namaFoto = $_FILES['foto']['name'];
	$errorFoto = $_FILES['foto']['error'];
	$sizeFoto = $_FILES['foto']['size'];
	$tmpFoto = $_FILES['foto']['tmp_name'];

	$ektensiValid = ['jpg', 'jpeg', 'png'];
	$ektensiFoto = explode('.', $namaFoto);
	$ektensiFoto = strtolower(end($ektensiFoto));

	if(!in_array($ektensiFoto, $ektensiValid)) {
		echo "<script>alert('Ektensi Harus JPG/PNG');</script>";
		return false;
	}

	if($sizeFoto > 1000000) {
		echo "<script>alert('Ukuran Max 1MB');</script>";
		return false;
	}

	$fotoLama = $_POST['fotoLama'];
	if($fotoLama != 'default.jpg') {
		unlink('../admin/img/profile/' . $fotoLama);
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpFoto, '../admin/img/profile/'. $namaFileBaru);
	return $namaFileBaru;
}

function gantipass($data)
{
	global $conn;
	$id = $_POST['id'];
	$passLama = htmlspecialchars(md5($data['passlama']));
	$passBaru1 = htmlspecialchars(md5($data['passbaru1']));
	$passBaru2 = htmlspecialchars($data['passbaru2']);

	if($passLama != $passBaru1) {
		echo "<script>alert('Password Lama, Tidak Boleh Sama Dengan Password Baru!');</script>";
		return false;
	}

	$conn->query("UPDATE tb_user SET password = '$passBaru1' WHERE id_user = $id") or die(mysqli_error($conn));
	return $conn->affected_rows;
}


// --------------------KONFIGURASI SITUS---------------------
function uploadImgLogo()
{
	$namaFotoLogo = $_FILES['uploadLogo']['name'];
	$sizeFotoLogo = $_FILES['uploadLogo']['size'];
	$errorFotoLogo = $_FILES['uploadLogo']['error'];
	$tmpFotoLogo = $_FILES['uploadLogo']['tmp_name'];

	if($errorFotoLogo == 4) {
		echo "<script>alert('Upload Logo Dulu.');</script>";
		return false;
	}

	$ektensiValid = ['jpeg', 'jpg', 'png'];
	$ektensiFoto = explode('.', $namaFotoLogo);
	$ektensiFoto = strtolower(end($ektensiFoto));

	if(!in_array($ektensiFoto, $ektensiValid)) {
		echo "<script>alert('Ektensi Harus JPG/PNG');</script>";
		return false;
	}

	if($sizeFotoLogo > 1000000) {
		echo "<script>alert('Size Max 1MB');</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpFotoLogo, '../img/logo/' . $namaFileBaru);
	return $namaFileBaru;
}

function uploadLogo($data) 
{
	global $conn;
	$uploadLogoLama = htmlspecialchars($data['uploadLogoLama']);
	if($_FILES['uploadLogo']['name'] === 4) {
		$uploadLogo = $uploadLogoLama;
	} else {
		$uploadLogo = uploadImgLogo();
	}

	$conn->query("UPDATE konfig_situs SET logo_situs = '$uploadLogo'") or die(mysqli_error($conn));
	return $conn->affected_rows;
}

function uploadImgIcon()
{
	$namaFotoIcon = $_FILES['uploadIcon']['name'];
	$sizeFotoIcon = $_FILES['uploadIcon']['size'];
	$errorFotoIcon = $_FILES['uploadIcon']['error'];
	$tmpFotoIcon = $_FILES['uploadIcon']['tmp_name'];

	if($errorFotoIcon == 4) {
		echo "<script>alert('Upload Icon Dulu.');</script>";
		return false;
	}

	$ektensiValid = ['jpeg', 'jpg', 'png'];
	$ektensiFoto = explode('.', $namaFotoIcon);
	$ektensiFoto = strtolower(end($ektensiFoto));

	if(!in_array($ektensiFoto, $ektensiValid)) {
		echo "<script>alert('Ektensi Harus JPG/PNG');</script>";
		return false;
	}

	if($sizeFotoIcon > 1000000) {
		echo "<script>alert('Size Max 1MB');</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpFotoIcon, '../img/logo/' . $namaFileBaru);
	return $namaFileBaru;
}

function uploadIcon($data) 
{
	global $conn;
	$uploadIconLama = htmlspecialchars($data['uploadIconLama']);
	if($_FILES['uploadIcon']['name'] === 4) {
		$uploadIcon = $uploadIconLama;
	} else {
		$uploadIcon = uploadImgIcon();
	}

	$conn->query("UPDATE konfig_situs SET logo_icon = '$uploadIcon'") or die(mysqli_error($conn));
	return $conn->affected_rows;
}

function tambahKonfig($data)
{
	global $conn;
	$nama = htmlspecialchars($data['nama']);
	$tax = htmlspecialchars($data['tax']);
	$isi = htmlspecialchars($data['isi']);
	$link = htmlspecialchars($data['link']);

	$conn->query("INSERT INTO konfigurasi VALUES(null, '$nama', '$tax', '$isi', '$link', 'konfigurasi')") or die(mysqli_error($conn));
	return $conn->affected_rows;
}

function editKonfig($data)
{
	global $conn;
	$count = count($data['id']);

	for ($i=0; $i < $count; $i++) { 
		$id = htmlspecialchars($data['id'][$i]);
		$nama = htmlspecialchars($data['nama'][$i]);
		$tax = htmlspecialchars($data['tax'][$i]);
		$isi = htmlspecialchars($data['isi'][$i]);
		$link = htmlspecialchars($data['link'][$i]);
		$conn->query("UPDATE konfigurasi SET nama = '$nama', tax = '$tax', isi = '$isi', link = '$link' WHERE id_kon = $id") or die(mysqli_error($conn));
	}
	return $conn->affected_rows;
}

function getprofileweb($tax)
{
	global $conn;
	$hasil = $conn->query("SELECT * FROM konfigurasi WHERE tax = '$tax' ORDER BY id_kon DESC LIMIT 1") or die(mysqli_error($conn));
	while($row = $hasil->fetch_assoc()) {
		return $row['isi'];
	}
}


// ----------------------------------KATEGORI----------------------------------------

function tambahKategori($data)
{
	global $conn;
	$nama = htmlspecialchars($data['nama']);
	$alias = htmlspecialchars($data['alias']);
	$terbit = htmlspecialchars($data['terbit']);

	if(empty($nama && $alias && $terbit)) {
		echo "<script>alert('Form tidak boleh kosong!');</script>";
		return false;
	}

	$conn->query("INSERT INTO kategori VALUES(null, '$nama', '$alias', '$terbit')") or die(mysqli_error($conn));
	return $conn->affected_rows;
}

function ubahKategori($data)
{
	global $conn;
	$id = htmlspecialchars($data['id']);
	$nama = htmlspecialchars($data['nama']);
	$alias = htmlspecialchars($data['alias']);
	$terbit = htmlspecialchars($data['terbit']);

	if(empty($nama && $alias && $terbit)) {
		echo "<script>alert('Form tidak boleh kosong!');</script>";
		return false;
	}

	$conn->query("UPDATE kategori SET nama_kategori = '$nama', alias = '$alias', terbit = '$terbit' WHERE id_kategori = $id") or die(mysqli_error($conn));
	return $conn->affected_rows;
}


// ---------------------------BERITA----------------------------

function tambahBerita($data)
{
	global $conn;
	$judul = htmlspecialchars($data['judul']);
	$kategori = htmlspecialchars($data['kategori']);
	$isi = $data['isi'];
	$teks = htmlspecialchars($data['teks']);
	$terbit = htmlspecialchars($data['terbit']);
	$tgl = date('d-F-Y');
	$updateBy = htmlspecialchars($data['updateby']);

	// cek foto
	$namaFoto = $_FILES['foto']['name'];
	$tmpFoto = $_FILES['foto']['tmp_name'];

	$ektensiValid = ['jpg', 'jpeg', 'png'];
	$ektensiFoto = explode('.', $namaFoto);
	$ektensiFoto = strtolower(end($ektensiFoto));

	// if(!in_array($ektensiFoto, $ektensiValid)) {
	// 	echo "<script>alert('Format Harus JPG/PNG!');</script>";
	// 	return false;
	// }

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpFoto, '../admin/img/berita/' . $namaFileBaru);

	$conn->query("INSERT INTO berita VALUES(null, '$judul', '$kategori', '$isi', '$namaFileBaru', '$teks', '$tgl', '$updateBy', '0', 'Berita', '$terbit')") or die(mysqli_error($conn));
	return $namaFileBaru;
	return $conn->affected_rows;
}

function ubahBerita($data)
{
	global $conn;
	$id = htmlspecialchars($data['id']);
	$judul = htmlspecialchars($data['judul']);
	$kategori = htmlspecialchars($data['kategori']);
	$isi = $data['isi'];
	$teks = htmlspecialchars($data['teks']);
	$terbit = htmlspecialchars($data['terbit']);
	$fotoLama = htmlspecialchars($data['fotoLama']);

	// cek foto
	if($_FILES['foto']['error'] == 4) {
		$foto = $fotoLama;
	} else {
		$foto = uploadFotoBerita();
	}

	$conn->query("UPDATE berita SET judul = '$judul', id_kategori = '$kategori', isi = '$isi', foto = '$foto', teks = '$teks', terbit = '$terbit' WHERE id_berita = $id") or die(mysqli_error($conn));
	return $conn->affected_rows;
}

function uploadFotoBerita()
{
	$namaFoto = $_FILES['foto']['name'];
	$sizeFoto = $_FILES['foto']['size'];
	$errorFoto = $_FILES['foto']['error'];
	$tmpFoto = $_FILES['foto']['tmp_name'];

	if($errorFoto === 4) {
		echo "<script>alert('Upload Foto Dulu.');</script>";
		return false;
	}

	$ektensiValid = ['jpeg', 'jpg', 'png'];
	$ektensiFoto = explode('.', $namaFoto);
	$ektensiFoto = strtolower(end($ektensiFoto));

	if(!in_array($ektensiFoto, $ektensiValid)) {
		echo "<script>alert('Ektensi Harus JPG/PNG');</script>";
		return false;
	}

	if($sizeFoto > 1000000) {
		echo "<script>alert('Size Max 1MB');</script>";
		return false;
	}

	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ektensiFoto;

	move_uploaded_file($tmpFoto, 'img/berita/' . $namaFileBaru);
	return $namaFileBaru;
}
