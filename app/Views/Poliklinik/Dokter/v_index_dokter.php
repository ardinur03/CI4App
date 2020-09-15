<section id="Tabel-Dokter">
  <div class="container bg-light">

    <div class="row">
      <div class="col-md-3">
        <form action="" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Masukan Nama ..." name="keyword">
            <div class="input-group-append">
              <button class="btn btn-outline-dark bg-light" type="submit" name="submit"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-7"></div>
      <div class="col-md-2">
        <a href="#" class="btn btn-success btn-sm tombol"><i class="fas fa-plus-circle"></i> Tambah Dokter</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
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
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="bg-primary">
              <tr class="text-white">
                <th scope="col">No</th>
                <th scope="col">Nama Dokter</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Spesialis</th>
                <th scope="col">Kontak</th>
                <th scope="colgroup">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php foreach ($dokter as $d) : ?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td><?= $d['Nama_Dokter']; ?></td>
                  <td><?= $d['Gender']; ?></td>
                  <td><?= $d['Spec']; ?></td>
                  <td><?= $d['Kontak']; ?></td>
                  <td>
                    <div class="btn-group">
                      <a href="/Poliklinik/Dokter/Update/<?= $d['Id_Dokter']; ?>" data-toggle="tooltip" data-placement="top" title="Update" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                      <a href="/Poliklinik/Dokter/detail/<?= $d['Id_Dokter']; ?>" data-toggle="tooltip" data-placement="top" title="Search" class="btn btn-warning btn-sm text-white"><i class="fas fa-search"></i></a>
                      <a href="/Poliklinik/Dokter/delete/<?= $d['Id_Dokter']; ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien atas nama <?= $d['Nama_Dokter']; ?> ... ini?')"><i class="far fa-trash-alt"></i></a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</section>