<?php 
$queryLogo = $conn->query("SELECT * FROM konfig_situs") or die(mysqli_error($conn));
$rLogo = $queryLogo->fetch_assoc();
?>
<div class="container">
  	<div class="row">
  		<div class="col-md-2">
  			<img src="<?= base_url('img/logo/') . $rLogo['logo_situs']; ?>" width="150">
  		</div>
  		<div class="col-md-4">
  			<div class="page-header">
			  <h3><?= getprofileweb('site_url'); ?> <small><?= getprofileweb('desc'); ?></small></h3>
			</div>
  		</div>
  		<div class="col-md-4">
  			<div class="page-header">
			  <h1>Iklan <small>disini.</small></h1>
			</div>
  		</div>
  	</div>
</div>