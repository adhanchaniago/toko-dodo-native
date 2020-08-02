<?php 
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
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#formUbahUser"><i class="fa fa-edit"></i></button>
							<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
						</td>
					</tr>
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

