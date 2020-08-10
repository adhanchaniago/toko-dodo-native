<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM berita") or die(mysqli_error($conn));
$row = $result->fetch_assoc();
$foto = $row['foto'];
if(file_exists('img/berita/' . $foto)) {
	unlink('img/berita/' . $foto);
}
$sql = $conn->query("DELETE FROM berita WHERE id_berita = $id") or die(mysqli_error($conn));
if($sql) {
	echo "<script>alert('Berita berhasil dihapus.');window.location='?p=berita';</script>";
} else {
	echo "<script>alert('Berita gagal dihapus.');window.location='?p=berita';</script>";
}