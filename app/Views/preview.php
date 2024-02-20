<?= $this->extend("template") ?>

<?= $this->section("title") ?>

<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container mt-5">
<div class="justify-content-start mb-4">
			<a class="nav-link" href="<?= base_url("home") ?>"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i></a>
		</div>
  <div class="row justify-content-center">
    <div class="col-5">
      <img class="card-img" src="<?= base_url('assets/foto/' . $foto->lokasi_file) ?>" alt=""
        style="border-radius: 23px;">
    </div>
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <!-- Like button -->

          <!-- Comments section -->
          <div class="d-flex justify-content-start mb-3">
            <?= $foto->username ?> /
            <?= date('d M Y', strtotime($foto->tanggal_unggah)) ?>
          </div>
          <div class="d-flex justify-content-start mb-2">
              <b><?= $foto->judul_foto?></b>
            </div>
            <div class="d-flex justify-content-start">
              <i><?= $foto->deskripsi_foto ?></i>
            </div>
            <?php if ($foto->user_id == session()->user_id): ?>
              <div class="d-flex justify-content-end gap-2 mt-4">
                <span>
                <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <b class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></b>
                  </button>
                </a>
                </span>
                <a href="<?= base_url('foto/' . $foto->foto_id . '/delete') ?>" class="btn btn-sm"
                  onclick="return confirm('Yakin Mau Hapus ?')">
                  <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                </a>
              </div>
              <?php endif; ?>
          <hr>

          <div class="container text-start">
            <div class="comments mt-4 mb-3">
              <?php foreach ($komentars as $index => $komentar): ?>
                <div class="mb-3">
                  <img src="<?= base_url('assets/template/img/av.png') ?>" alt="Avatar" class="rounded-circle me-2"
                    style="width: 30px; height: 30px;">
                  <span class="fw-bold">
                    <?= $usernames[$index ] ?>:
                  </span>
                  <?= $komentar->isi_komentar ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <div class="d-flex justify-content-end gap-2 mb-4">
            <div>
              <form action="<?= base_url('like/' . $foto->foto_id) ?>" method="post">
                <?php
                if ($like) {
                  ?>
                  <?= $like ?>
                  <?php
                }
                ?>
                <button style="border: none; background: white;" type="submit">
                  <?php
                  if ($isLiked) {
                    ?>
                    <i class="fa-solid fa fa-heart fa-lg text-danger" aria-hidden="true"></i>
                    <?php
                  } else {
                    ?>
                    <i class="fa-reguler fa fa-heart-o fa-lg" aria-hidden="true"></i>
                  <?php
                  }
                  ?>

                </button>
              </form>
            </div>
          </div>
          <!-- Form untuk menambahkan komentar baru -->
          <form method="post" action="<?= base_url("komen") ?>" enctype="multipart/form-data">
            <div class="input-group mb-3">
              <input type="hidden" name="id" value="<?= $foto->foto_id ?>">
              <input type="text" name="isi_komentar" class="form-control" placeholder="Tambahkan komentar...">
              <button class="btn btn-dark" type="submit" id="button-addon2">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
              </button>
            </div>
          </form>

          <!-- modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Your Photo</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">

                  <form method="post" action="<?= base_url("edit_foto")?>" enctype="multipart/form-data">
                  <input type="hidden" name="foto_id" id="foto_id" value="<?= $foto->foto_id ?>">
                    <label type="file" for="lokasi_file" class="drop-container" id="dropcontainer">
                    <span class="drop-title">Drop files here</span>
                    or
                    <input type="file" name="lokasi_file" id="lokasi_file" accept="image/*" >
                    </label>
                    </div>
                    <div class="col">
                      <div class="mb-2">	
                      <label class="d-flex justify-content-start">  Judul Foto:</label>
                      <input type="text" name="judul_foto" class="form-control" value="<?= $foto->judul_foto ?>" required>
                    </div>
                    <div class="mb-2 mt-4">
                      <label class="form-label d-flex justify-content-start">   Deskripsi:</label>
                      <input class="form-control" value="<?= $foto->deskripsi_foto ?>" name="deskripsi_foto" id="floatingTextarea2" style="height: 100px"></input>
                    </div>			
                    <div class="d-flex justify-content-end mt-4">
                      <button type="submit" class="btn btn-outline-dark">Upload</button>
                    </div>
                  </form>
                  
              </div>
              </div>
            </div>
            </div>
          </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>


<?= $this->endSection() ?>