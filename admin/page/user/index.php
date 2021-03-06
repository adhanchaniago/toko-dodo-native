<?php 

if($_SESSION['level'] == 1) {


// menampilkan semua tabel user
$queryUser = $conn->query("SELECT * FROM tb_user") or die(mysqli_error($conn));

// jika tombol tambah user diklik
if(isset($_POST['tambah'])) {
	if(tambahuser($_POST) > 0) {
		echo "<script>alert('Data User Berhasil Ditambahkan.');window.location='?p=user';</script>";
	} else {
		echo "<script>alert('Data User Gagal Ditambahkan.');window.location='?p=user';</script>";
	}
}

if(isset($_POST['ubah'])) {
	if(ubahuser($_POST) > 0) {
		echo "<script>alert('Data User Berhasil Diubah.');window.location='?p=user';</script>";
	} else {
		echo "<script>alert('Data User Gagal Diubah.');window.location='?p=user';</script>";
	}
}
?>
<div class="row" style="margin-bottom: 10px;">
	<div class="col-md-6">
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#formTambahUser"><i class="fa fa-plus"></i> Tambah User</button>
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-heading">
		Data User
	</div>
	<div class="panel-body">
		<div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
                	$no = 1;
                	while($data = $queryUser->fetch_assoc()) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $data['nama_user']; ?></td>
						<td><?= $data['email']; ?></td>
						<td><?= $data['password']; ?></td>
						<td>
							<img src="<?= base_url('admin/img/profile/') . $data['foto_user']; ?>" width="50">
						</td>
						<td>
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#formUbahUser<?= $data['id_user']; ?>"><i class="fa fa-edit"></i></button>
							<a href="?p=huser&id=<?= $data['id_user']; ?>" class="btn btn-danger" onclick="return confirm('Yakin ?')"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
						<!-- MODAL FROM Ubah USER -->
						<div class="modal fade" id="formUbahUser<?= $data['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						    <div class="modal-content">
						        <div class="modal-header">
						            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						            <h4 class="modal-title" id="modalUbahLabel">Tambah User</h4>
						        </div>
						        <div class="modal-body">
						        <form action="" method="post" enctype="multipart/form-data">
						        	<input type="hidden" name="id" value="<?= $data['id_user']; ?>">
									<div class="form-group">
						                <label for="nama">Nama User</label>
						                <input class="form-control" name="nama" id="nama" type="text" required="" value="<?= $data['nama_user']; ?>">
						            </div>
						            <div class="form-group">
						                <label for="email">Email</label>
						                <input class="form-control" name="email" id="email" type="email" required="" readonly="" value="<?= $data['email']; ?>">
						            </div>
						            <div class="form-group">
						                <label for="password">Password</label>
						                <input class="form-control" name="password" id="password" type="password" required="" value="<?= $data['password']; ?>">
						            </div>
						            <div class="form-group">
						                <label for="foto">Foto</label><br>
						                <img src="<?= base_url('admin/img/profile/') . $data['foto_user']; ?>" width="100">
						                <input type="text" name="fotoLama" value="<?= $data['foto_user']; ?>">
						                <input class="form-control-file" name="foto" id="foto" type="file">
						            </div>
							        <div class="modal-footer">
							            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							            <button type="submit" name="ubah" class="btn btn-primary">Save changes</button>
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
<div class="modal fade" id="formTambahUser" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="modalTambahLabel">Tambah User</h4>
        </div>
        <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label for="nama">Nama User</label>
                <input class="form-control" name="nama" id="nama" type="text" required="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" name="email" id="email" type="email" required="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" name="password" id="password" type="password" required="">
            </div>
            <div class="form-group">
                <label for="foto">Foto</label><br>
                <input class="form-control-file" name="foto" id="foto" type="file">
            </div>
	        <div class="modal-footer">
	            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	            <button type="submit" name="tambah" class="btn btn-primary">Save changes</button>
	        </div>
		</form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php 
} else {
	header("Location: index.php"); exit;
}

?>
