<?php 
if(isset($_POST['cari'])) {
  $keyword = $_POST['keyword'];
  echo "<b>Hasil pencarian : " . $keyword . "</b>";
  
}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a></li>
        <?php 
        $queryKategori = $conn->query("SELECT * FROM kategori WHERE terbit = '1'") or die(mysqli_error($conn));
        while($rKat = $queryKategori->fetch_assoc()) {
        	extract($rKat);
        ?>
        <li><a href="?p=katlihat&id=<?= $rKat['id_kategori']; ?>"><?= $nama_kategori; ?></a></li>
        <?php } ?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
	    <form class="navbar-form navbar-left" action="cari.php" method="post">
	        <div class="form-group">
	          <input type="text" name="keyword" class="form-control" placeholder="Cari">
	        </div>
	        <button type="submit" name="cari" class="btn btn-default">Cari</button>
	    </form>
	    <li><a href="<?= base_url('admin/login.php'); ?>">Masuk</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>