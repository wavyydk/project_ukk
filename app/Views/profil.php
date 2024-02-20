<?= $this->extend("template") ?>

<?= $this->section("title") ?>
Profile
<?= $this->endSection() ?>

<?= $this->section("content") ?>

<div class="container mt-6">
    <div class="row">
    <div class="justify-content-start mb-4">
			<a class="nav-link" href="<?= base_url("home") ?>"><i class="fa fa-chevron-circle-left fa-2x" aria-hidden="true"></i></a>
		</div>
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                <div class="jumbotron border-round-0 min-50vh" href="https://images.unsplash.com/photo-1522204657746-fccce0824cfd?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=84b5e9bea51f72c63862a0544f76e0a3&auto=format&fit=crop&w=1500&q=80">
                  </div>
                  <div class="container mb-4">
                    <img src="<?= base_url("assets/template/img/av.png") ?>" class="mt-neg100 mb-4 rounded-circle" width="128">
                    <h1 class="font-weight-bold title"><?= $username->username ?></h1>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          
          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>