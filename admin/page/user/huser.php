<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tb_user WHERE id_user = $id");
$row = $result->fetch_assoc();
$foto = $row['foto_user'];

if($foto != 'default.jpg') {
	unlink('img/profile/' . $foto);
}

$slq = $conn->query("DELETE FROM tb_user WHERE id_user = $id") or die(mysqli_error($conn));
if($slq) {
	echo "<script>alert('Data User Berhasil Dihapus.');window.location='?p=user';</script>";
} else {
	echo "<script>alert('Data User Gagal Dihapus.');window.location='?p=user';</script>";
}