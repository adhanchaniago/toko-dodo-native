<?php 
21:52
// menampilkan semua tabel user
$queryBe = $conn->query("SELECT * FROM berita INNER JOIN kategori ON berita.id_kategori = kategori.id_kategori") or die(mysqli_error($conn));
$queryKat = $conn->query("SELECT * FROM kategori") or die(mysqli_error($conn));

// jika tombol tambah user diklik
if(isset($_POST['tambah'])) {
	if(tambahBerita($_POST) > 0) {
		echo "<script>alert('Data Berita Berhasil Ditambahkan.');window.location='?p=berita';</script>";
	} else {
		echo "<script>alert('Data Berita Gagal Ditambahkan.');window.location='?p=berita';</script>";
	}
}

if(isset($_POST['ubah'])) {
	if(ubahKategori($_POST) > 0) {
		echo "<script>alert('Data Kategori Berhasil Diubah.');window.location='?p=kategori';</script>";
	} else {
		echo "<script>alert('Data Kategori Gagal Diubah.');window.location='?p=kategori';</script>";
	}
}
?>
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-6">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formTambahBe"><i class="fa fa-plus"></i> Tambah Berita</button>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		Data Berita
	</div>
	<div class="panel-body">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Berita</th>
                        <th>Kategori</th>
                        <th>Isi Berita</th>
                        <th>Foto</th>
                        <th>Teks</th>
                        <th>Terbitkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1;
                	while($data = $queryBe->fetch_assoc()) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $data['judul']; ?></td>
						<td><?= $data['nama_kategori']; ?></td>
						<td><?= $data['isi']; ?></td>
						<td>
							<img src="img/berita/<?= $data['foto']; ?>" width="100">
						</td>
						<td><?= $data['teks']; ?></td>
						<td><?= $data['terbit'] == '1' ? 'Ya' : 'Tidak'; ?></td>
						<td>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#formUbahKat<?= $data['id_kategori']; ?>"><i class="fa fa-edit"></i></button>
							<a href="?p=hkat&id=<?= $data['id_kategori']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
						<!-- MODAL FROM Ubah USER -->
						<div class="modal fade" id="formUbahKat<?= $data['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						            <h4 class="modal-title" id="modalUbahLabel">Ubah User</h4>
						        </div>
						        <div class="modal-body">
						        <form action="" method="post">
						        	<input type="text" name="id" value="<?= $data['id_kategori']; ?>">
									<div class="form-group">
						                <label for="nama">Nama Kategori</label>
						                <input class="form-control" name="nama" id="nama" type="text" required="" value="<?= $data['nama_kategori']; ?>">
						            </div>
						            <div class="form-group">
						                <label for="alias">Alias</label>
						                <input class="form-control" name="alias" id="alias" type="text" required="" value="<?= $data['alias']; ?>">
						            </div>
						            <div class="form-group">
						            	<label>Tampilkan ?</label>
						                <div class="form-check">
										  <input class="form-check-input" type="radio" name="terbit" id="terbit" value="1" <?php if($data['terbit'] == '1'){echo "checked";} ?>>
										  <label class="form-check-label" for="terbit">
										    Ya
										  </label>
										</div>
										<div class="form-check">
										  <input class="form-check-input" type="radio" name="terbit" id="terbit" value="2" <?php if($data['terbit'] == '2'){echo "checked";} ?>>
										  <label class="form-check-label" for="terbit">
										    Tidak
										  </label>
										</div>
						            </div>
							        <div class="modal-footer">
							            <button type="reset" class="btn btn-default" data-dismiss="modal">Reset</button>
							            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
							        </div>
								</form>
						        </div>
						    </div>
						    <!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
						</div>
                	<?php endwhile; ?>
                </tbody>
            </table>
        </div>
	</div>
</div>

<!-- MODAL FROM TAMBAH USER -->
<div class="modal fade" id="formTambahBe" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modalTambahLabel">Tambah Berita</h4>
        </div>
        <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
        	<input type="text" name="updateby" value="<?= $_SESSION['nama']; ?>">
			<div class="form-group">
                <label for="judul">Judul Berita</label>
                <input class="form-control" name="judul" id="judul" required type="text" required="">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select name="kategori" id="kategori" class="form-control">
                	<option value="">Pilih Kategori</option>
                	<?php while($dKat = $queryKat->fetch_assoc()) : ?>
					<option value="<?= $dKat['id_kategori']; ?>"><?= $dKat['nama_kategori']; ?></option>
                	<?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
            	<label for="isi">Isi Berita</label>
            	<textarea name="isi" id="isi" class="form-control" required>Isi Berita...</textarea>
            </div>
            <div class="form-group">
            	<label for="foto">Foto</label>
            	<input type="file" name="foto" id="foto" class="form-control-file">
            </div>
            <div class="form-group">
            	<label for="teks">Teks</label>
            	<textarea name="teks" id="teks" class="form-control" required></textarea>
            </div>
            <div class="form-group">
            	<label>Tampilkan ?</label>
                <div class="form-check">
				  <input class="form-check-input" type="radio" name="terbit" id="terbit" value="1">
				  <label class="form-check-label" for="terbit">
				    Ya
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="terbit" id="terbit" value="2">
				  <label class="form-check-label" for="terbit">
				    Tidak
				  </label>
				</div>
            </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
	        </div>
		</form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

