<?php
$id = $_GET['id'];

$sql = $conn->query("DELETE FROM konfigurasi WHERE id_kon = $id") or die(mysqli_error($conn));
if($sql) {
	echo "<script>alert('Konfigurasi berhasil dihapus.');window.location='?p=konfig';</script>";
} else {
	echo "<script>alert('Konfigurasi gagal dihapus.');window.location='?p=konfig';</script>";
}