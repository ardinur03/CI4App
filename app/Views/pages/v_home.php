<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar'); ?>

<!-- jumbotron welcome start -->
<section id="welcome">
  <div class="jumbotron jumbotron-fluid animate__animated animate__zoomIn">
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
            <img src="<?= base_url('/assets/img/info-img/student.png'); ?>" alt="Icon images Student Not Found" class="float-left">
            <h4>Student</h4>
            <p>software engineering</p>
          </div>
          <div class="col-lg">
            <img src="<?= base_url('/assets/img/info-img/school.png'); ?>" alt="Icon images School Not Found" class="float-left materialboxeds">
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
  <div class="container-fluid" id="carouselExampleIndicators" data-ride="carousel">
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

<?= $this->include('layout/footer'); ?>
<?= $this->endsection(); ?>