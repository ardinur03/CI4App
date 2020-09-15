<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar'); ?>

<!-- Slider Image start -->
<section id="Slider-img">
  <div id="carouselExampleIndicators" class="carousel slide carousel-fade d-none d-sm-block" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="/assets/img/bg-img/slide1.jpg" class="d-block w-100" alt="Image Slider Not Found">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-4">Welcome To My Website</h1>
          <p class="font-font-weight-bold">Explore My Website</p>
          <a class="overflow-hidden" href="#Social-Media" role="button"><i class="fa-3x fas fa-angle-double-down"></i></i></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/img/bg-img/slide2.jpg" class="d-block w-100" alt="Image Slider Not Found">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-4">Welcome To My Website</h1>
          <p class="font-font-weight-bold">Explore My Website</p>
          <a class="overflow-hidden" href="#" role="button"><i class="fa-3x fas fa-angle-double-down"></i></i></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/assets/img/bg-img/hero-ardi.png" class="d-block w-100" alt="Image Slider Not Found">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-4">Welcome To My Website</h1>
          <p class="font-font-weight-bold">Explore My Website</p>
          <a class="overflow-hidden" href="#" role="button"><i class="fa-3x fas fa-angle-double-down"></i></i></a>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
<!-- Slider Image end -->

<!--social buttons start-->
<!-- <section id="Social-Media" class="d-none d-sm-block">
  <div class="social  mt-5 mb-5">
    <a href="#">Facebook <i class="fab fa-facebook"></i></a>
    <a href="#">Youtube <i class="fab fa-youtube"></i></a>
    <a href="#">Instagram <i class="fab fa-instagram"></i></a>
    <a href="#">Twitter<i class="fab fa-twitter"></i></a>
  </div>
</section> -->
<!--social buttons end-->
<?= $this->include('layout/footer'); ?>

<?= $this->endsection(); ?>