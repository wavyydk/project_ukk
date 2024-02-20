<?= $this->extend("template") ?>

<?= $this->section("title") ?>
Home
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<main role="main">
    <section class="mt-4 mb-5">
    <div class="container mb-4">
    	<h1 class="font-weight-bold title text-center"><i><b>E</b></i>xplore</h1>
    	<div class="row">
    		<nav class="navbar navbar-expand-lg navbar-light bg-white pl-2 pr-2">
    		<button class="navbar-light navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExplore" aria-controls="navbarsDefault" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="navbarsExplore">
    			<ul class="navbar-nav">
    				<li class="nav-item">
    				<a class="nav-link" href="<?= base_url("home")?>"><b>Home</b></a>
    				</li>
    				<li class="nav-item">
    				<a class="nav-link" href="<?= base_url("upload")?>"><b>Upload</b></a>
    				</li>
            		<li class="nav-item">
    				<a class="nav-link" data-bs-toggle="modal" data-bs-target="#addAlbum"><b>Add Album</b></a>
    				</li>
            		<li class="nav-item dropdown">
    				<a class="nav-link dropdown-toggle" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Album</b></a>
    				<div class="dropdown-menu shadow-lg" name="album_id" class="form-select" aria-labelledby="dropdown01">
            		<?php
							foreach($rows1 as $row1){
							?>
    					<a class="dropdown-item" href="<?= base_url($row1->album_id)?>" value="<?= $row1->album_id?>"><?= $row1->nama_album ?></a>
             		 <?php
					}
					?>
    				</div>
    				</li>
    			</ul>
    		</div>
    		</nav>
    	</div>
    </div>
	
<div class="container-fluid">
    	<div class="row">
    		<div class="card-columns">
				<?php
				foreach($rows as $row) :
				?>
    			<div class="card card-pin">
    				<a href="<?= base_url('foto/'.$row->foto_id.'/preview') ?>">
    				<img class="card-img" src="<?= base_url('assets/foto/'.$row->lokasi_file) ?>" alt="Card image">
    				<div class="overlay">
    					<h2 class="card-title title"><?= $row->judul_foto ?></h2>
    					<div class="more">	
    						<i class="fa fa-arrow-circle-o-right" aria-hidden="true"> more</i>
    					</div>
    				</div>
					</a>
    			</div>
					<?php
						endforeach
					?>
    		</div>
    	</div>
    </div>

<?= $this->endSection() ?>