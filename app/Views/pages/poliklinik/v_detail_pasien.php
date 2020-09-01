<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar/navbarPoliklinik'); ?>
<section id="detail-messages">
  <div class="container">
    <div class="card text-center">
      <div class="card-header bg-primary mb-2">
        <ul class="nav nav-pills card-header-pills">
          <h4 style="color: white;">Detail Pasien</h4>
        </ul>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12 text-left">
            <table border="0">
              <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td><?= $pasien['Nama_Pasien']; ?></td>
              </tr>
              <tr>
                <td>Alamat Detail</td>
                <td>:</td>
                <td><?= $pasien['Alamat_Detail']; ?></td>
              </tr>
              <tr>
                <td>Alamat Kelurahan</td>
                <td>:</td>
                <td><?= $pasien['Alamat_Kelurahan']; ?></td>
              </tr>
              <tr>
                <td>Alamat Kecamatan</td>
                <td>:</td>
                <td><?= $pasien['Alamat_Kecamatan']; ?></td>
              </tr>
              <tr>
                <td>Alamat Kota/Kab</td>
                <td>:</td>
                <td><?= $pasien['Alamat_KotaKab']; ?></td>
              </tr>
              <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?= $pasien['Tmp_Lahir']; ?></td>
              </tr>
              <tr>
                <td>tanggal Lahir</td>
                <td>:</td>
                <td><?= $pasien['Tgl_Lahir']; ?></td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>:</td>
                <td><?= $pasien['Gender']; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>