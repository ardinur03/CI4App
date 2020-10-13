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
        <a href="/poliklinik/pasien/create" class="btn btn-success btn-sm tombol"><i class="fas fa-user-plus"></i> Tambah Pasien</a>
      </div>
    </div>

    <!-- SweetAlert start -->
    <div class="swal" data-swal="<?= session()->get('message_success'); ?>"></div>
    <div class="inf" data-swal="<?= session()->get('message_info'); ?>"></div>
    <!-- SweetAlert end -->

    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-sm table-responsive table-hover">
              <thead class="table-secondary">
                <tr>
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
                        <a href="/poliklinik/pasien/update/<?= $p['Id_Pasien']; ?>" data-toggle="tooltip" data-placement="top" title="Update" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="/poliklinik/pasien/detail/<?= $p['Id_Pasien']; ?>" data-toggle="tooltip" data-placement="top" title="Search" class="btn btn-warning btn-sm text-white"><i class="fas fa-search"></i></a>
                        <a href="/poliklinik/pasien/delete/<?= $p['Id_Pasien']; ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm btn-hapus"><i class="far fa-trash-alt"></i></a>
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
    </div>
  </div>
</section>