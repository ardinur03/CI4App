<?= $this->extend('layout/tamplate'); ?>

<?= $this->section('content'); ?>
<?= $this->include('layout/navbar/navbarPoliklinik'); ?>
<section id="table-section">
  <div class="container mt-4 bg-light">
    <div class="row">
      <div class="col-12">
        <h1>CRUD Sederhana Pasien</h1>
        <a href="/poliklinik/create" class="btn btn-success btn-sm mb-3"><i class="fas fa-plus-circle"></i> Tambah Pasien</a>
      </div>
      <div class="col-12">
        <div class="container">
          <?php
          if (!empty(session()->getFlashdata('success'))) { ?>

            <div class="alert alert-success">
              <?php echo session()->getFlashdata('success'); ?>
            </div>

          <?php } ?>
          <?php if (!empty(session()->getFlashdata('info'))) { ?>

            <div class="alert alert-primary">
              <?php echo session()->getFlashdata('info'); ?>
            </div>

          <?php } ?>

          <?php if (!empty(session()->getFlashdata('warning'))) { ?>

            <div class="alert alert-danger">
              <?php echo session()->getFlashdata('warning'); ?>
            </div>

          <?php } ?>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr class="text-white">
              <th scope="col">No</th>
              <th scope="col">Kode Pasien</th>
              <th scope="col">Nama Pasien</th>
              <th scope="col">Alamat Detail</th>
              <th scope="col">Alamat Kelurahan</th>
              <th scope="col">Alamat Kecamatan</th>
              <th scope="col">Alamat Kota/Kab</th>
              <th scope="col">Tempat Lahir</th>
              <th scope="col">tanggal Lahir</th>
              <th scope="col">Gender</th>
              <th scope="colgroup">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pasien as $p) : ?>
              <tr>
                <th scope="row"><?= $no++; ?></th>
                <td><?= $p['Id_Pasien']; ?></td>
                <td><?= $p['Nama_Pasien']; ?></td>
                <td><?= $p['Alamat_Detail']; ?></td>
                <td><?= $p['Alamat_Kelurahan']; ?></td>
                <td><?= $p['Alamat_Kecamatan']; ?></td>
                <td><?= $p['Alamat_KotaKab']; ?></td>
                <td><?= $p['Tmp_Lahir']; ?></td>
                <td><?= $p['Tgl_Lahir']; ?></td>
                <td><?= $p['Gender']; ?></td>
                <td>
                  <div class="btn-group">
                    <a href="/poliklinik/update/<?= $p['Id_Pasien']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="/poliklinik/detail/<?= $p['Id_Pasien']; ?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-search"></i></a>
                    <a href="/poliklinik/delete/<?= $p['Id_Pasien']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien atas nama <?= $p['Nama_Pasien']; ?> ... ini?')"><i class="far fa-trash-alt"></i></a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <!-- Modal Update Pasien Start -->
        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Recipient:</label>
                    <input type="text" class="form-control" id="recipient-name">
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control" id="message-text"></textarea>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Update Pasien End -->
      </div>
    </div>
  </div>
</section>
<?= $this->include('layout/footer'); ?>
<?= $this->endSection(); ?>