<?php
$id = $_GET['id'];

$sql = $conn->query("DELETE FROM kategori WHERE id_kategori = $id") or die(mysqli_error($conn));
if($sql) {
	echo "<script>alert('Kategori berhasil dihapus.');window.location='?p=kategori';</script>";
} else {
	echo "<script>alert('Kategori gagal dihapus.');window.location='?p=kategori';</script>";
}