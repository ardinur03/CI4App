<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar'); ?>

<!-- jumbotron welcome start -->
<section id="welcome">
  <div class="jumbotron jumbotron-fluid animate__animated animate__heartBeat">
    <div class="container">
      <h1 class="display-4 animate__animated animate__zoomInUp animate__delay-1s">Welcome to my Website</h1>
    </div>
  </div>
</section>
<!-- jumbotron welcome end -->

<!-- info panel start -->
<section id="info-panel">
  <div class="container animate__animated animate__zoomInUp animate__delay-1s">
    <div class="row justify-content-center">
      <div class="col-lg-9 info-panel">
        <div class="row">
          <div class="col-lg">
            <img src="<?= base_url('/assets/img/info-img/student.png'); ?>" draggable="false" alt="Icon images Student Not Found" class="float-left">
            <h4>Student</h4>
            <p>software engineering</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('/assets/img/info-img/school.png'); ?>" draggable="false" alt="Icon images School Not Found" class="float-left materialboxeds">
            <h4 class="school">My School</h4>
            <p>SMK Negeri 11 Kota Bandung</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- info panel end-->

<!-- opening me start -->
<section id="opening-me">
  <div class="container-fluid mt-5" id="carouselExampleIndicators" data-ride="carousel">
    <div class="row justify-content-center opening">
      <div class="col text-center">
        <h2>Sekolah Menengah Kejuruan Negeri<br>11<br>Kota Bandung<br>Rekayasa Perangkat Lunak<br>( RPL )</h2>
        <p></p>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- openning me end -->

<!-- opening learn start -->
<section id="opening-learn">
  <div class="container-fluid mb-5 mt-5">
    <div class="row">
      <div class="col-md-3">
        <div class="card box-learn">
          <img src="<?= base_url('assets/img/learn-img/idea.png'); ?>" class="" draggable="false" alt="...">
          <div class="card-body">
            <h3 class="card-title">Think Logically</h3>
            <p class="card-text">Memperhatikan algoritma yang sesuai kebutuhan sistem.</p>
          </div>
          <div class="card-footer footer-warna">
            <small class="text-dark">ardinur_03</small>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card box-learn box-warna">
          <img src="<?= base_url('assets/img/learn-img/programmer.png'); ?>" class="" draggable="false" alt="...">
          <div class="card-body">
            <h3 class="card-title">Programmer</h3>
            <p class="card-text">Mengoding sesuai algoritma.</p>
          </div>
          <div class="card-footer footer-warna">
            <small class="text-dark">ardinur_03</small>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card box-learn">
          <img src="<?= base_url('assets/img/learn-img/design.png'); ?>" class="" draggable="false" alt="...">
          <div class="card-body">
            <h3 class="card-title">Design</h3>
            <p class="card-text">Mendesain project yang User Friendly.</p>
          </div>
          <div class="card-footer footer-warna">
            <small class="text-dark">ardinur_03</small>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card box-learn box-warna">
          <img src="<?= base_url('assets/img/learn-img/notebook.png'); ?>" class="" draggable="false" alt="...">
          <div class="card-body">
            <h3 class="card-title">Writing</h3>
            <p class="card-text">Mendokumentasikan hal hal baru yang di temukan dalam pengerjaan project.</p>
          </div>
          <div class="card-footer footer-warna">
            <small class="text-dark">ardinur_03</small>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>
<!-- opening learn end -->

<!-- banner text start -->
<section id="banner-text">
  <div class="container-fluid mt-5">
    <div class="row justify-content-center">
      <div class="col-md-12 mb-5 heading-section">
        <!--  and  -->
        <h2 class="mb-5 embed-responsive">start &amp; <span> &nbsp;&nbsp;&nbsp;work on it</span></h2>
      </div>
    </div>
  </div>
</section>
<!-- banner text start -->
<?= $this->include('layout/footer'); ?>
<?= $this->endsection(); ?>