<?= $this->extend("template") ?>

<?= $this->section("title") ?>
Upload
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container mt-5">
	<div class="card-body">
		<div class="justify-content-start mb-4">
			<a class="nav-link" href="<?= base_url("home") ?>"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i></a>
		</div>
  		<div class="row">
    		<div class="col">
				<form method="post" action="<?= base_url("upload_foto")?>" enctype="multipart/form-data">
					<label type="file" for="lokasi_file" class="drop-container" id="dropcontainer">
					<span class="drop-title">Drop files here</span>
					or
					<input type="file" name="lokasi_file" id="lokasi_file" accept="image/*" required>
					</label>
					</div>
					<div class="col">
						<div class="mb-2">	
						<label>Judul Foto</label>
						<input type="text" name="judul_foto" class="form-control" required>
					</div>
					<div class="mb-2">
						<label class="form-label">Deskripsi</label>
						<textarea class="form-control" placeholder="Tambahkan deskripsi.." name="deskripsi_foto" id="floatingTextarea2" style="height: 100px"></textarea>
					</div>			
					<div class="mb-2">
						<label>Album</label>
						<select name="album_id" class="form-select">
							<option value="">
								Not Selected
							</option>
							<?php
							foreach($rows1 as $row1){
							?>
							<option value="<?= $row1->album_id?>">
								<?= $row1->nama_album ?>
							</option>
							<?php
							}
							?>
						</select>	
					</div>
					<div class="mb-5 mt-3">
						<button type="submit" class="btn btn-outline-dark">Upload</button>
					</div>
				</form>
   			</div>
  		</div>
	</div>
</div>
    

<?= $this->endSection() ?>