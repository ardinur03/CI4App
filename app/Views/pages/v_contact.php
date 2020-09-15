<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar'); ?>

<section id="hero-contact">
  <div class="jumbotron jumbotron-fluid bg-img-jumbotron justify-content-center">
    <div class="container">
      <h1 class="display-4 contact-me">Contact Me</h1>
    </div>
  </div>
</section>

<!--contact section start-->
<section id="contact-section">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
        <div class="contact-info">
          <div><i class="fas fa-map-marker-alt"></i>Jalan Raya Contong No. 63</div>
          <div><i class="fas fa-envelope"></i>ardinurinsan03@gmail.com</div>
          <div><i class="fas fa-phone"></i>0895328885809</div>
          <!-- <div><i class="fas fa-clock"></i><p id="jam"></p> : <p id="menit"></p> : <p id="detik"></p></div> -->
        </div>
      </div>
      <div class="col-md-7">
        <div class="contact-form">
          <h2>Contact Me</h2>
          <form class="contact" action="" method="post">
            <input type="text" name="name" class="text-box" placeholder="Your Name" required>
            <input type="email" name="email" class="text-box" placeholder="Your Email" required>
            <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
            <input type="submit" name="submit" class="send-btn" value="Send">
          </form>
        </div>
      </div>
    </div>
  </div>
</section> <br><br><br>
<!--contact section end-->

<?= $this->include('layout/footer'); ?>
<?= $this->endsection(); ?>