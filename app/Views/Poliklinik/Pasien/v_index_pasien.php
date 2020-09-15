<section id="table-section">
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
      <div class="col-md-9">
        <a href="/Poliklinik/Pasien/Create" class="btn btn-success btn-sm tombol"><i class="fas fa-plus-circle"></i> Tambah Pasien</a>
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
            <?php $no = 1 + (5 * ($currentPage - 1)); ?>
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
                    <a href="/Poliklinik/Pasien/Update/<?= $p['Id_Pasien']; ?>" data-toggle="tooltip" data-placement="top" title="Update" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="/Poliklinik/Pasien/detail/<?= $p['Id_Pasien']; ?>" data-toggle="tooltip" data-placement="top" title="Search" class="btn btn-warning btn-sm text-white"><i class="fas fa-search"></i></a>
                    <a href="/Poliklinik/Pasien/delete/<?= $p['Id_Pasien']; ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pasien atas nama <?= $p['Nama_Pasien']; ?> ... ini?')"><i class="far fa-trash-alt"></i></a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <!-- method links berpawameter 2 yaitu nama_table, nama_variabel_template_pagination=>|yang ada di config pager variabel template| -->
        <?= $pager->links('pasien', 'pagination'); ?>
      </div>
    </div>
  </div>
</section>