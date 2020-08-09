<?php 
// menampilkan semua tabel user
$queryKat = $conn->query("SELECT * FROM kategori") or die(mysqli_error($conn));

// jika tombol tambah user diklik
if(isset($_POST['tambah'])) {
	if(tambahKategori($_POST) > 0) {
		echo "<script>alert('Data Kategori Berhasil Ditambahkan.');window.location='?p=kategori';</script>";
	} else {
		echo "<script>alert('Data Kategori Gagal Ditambahkan.');window.location='?p=kategori';</script>";
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
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#formTambahKat"><i class="fa fa-plus"></i> Tambah Kategori</button>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		Data Kategori
	</div>
	<div class="panel-body">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Alias</th>
                        <th>Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1;
                	while($data = $queryKat->fetch_assoc()) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $data['nama_kategori']; ?></td>
						<td><?= $data['alias']; ?></td>
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
<div class="modal fade" id="formTambahKat" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modalTambahLabel">Tambah Kategori</h4>
        </div>
        <div class="modal-body">
        <form action="" method="post">
			<div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input class="form-control" name="nama" id="nama" type="text" required="">
            </div>
            <div class="form-group">
                <label for="alias">Alias</label>
                <input class="form-control" name="alias" id="alias" type="text" required="">
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

