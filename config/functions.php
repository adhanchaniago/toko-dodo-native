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

// --------------USER------------------------ 30:16
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