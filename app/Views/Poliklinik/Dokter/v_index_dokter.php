<section id="Tabel-Dokter">
  <div class="container bg-light">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Data Dokter</h3>
      </div>

      <div class="row mt-3 ml-5">
        <div class="col-3">
          <form action="" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukan nama ..." name="keyword">
              <div class="input-group-append">
                <button class="btn btn-outline-dark bg-light" type="submit" name="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-3 ml-auto">
          <a href="/poliklinik/dokter/create" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah dokter</a>
        </div>
      </div>

      <!-- SweetAlert -->
      <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
      <div class="inf" data-swal="<?= session()->get('message_info'); ?>"></div>
      <!-- SweetAlert end -->

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-hover">
              <thead class="table-secondary">
                <tr>
                  <th scope="row">No</th>
                  <th scope="col">Nama Dokter</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Spesialis</th>
                  <th scope="col">Kontak</th>
                  <th scope="colgroup">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($dokter as $d) : ?>
                  <tr>
                    <td scope="row" class="text-center"><?= $no++; ?></td>
                    <td class="text-left"><?= $d['Nama_Dokter']; ?></td>
                    <td class="text-center"><?= $d['Gender']; ?></td>
                    <td class="text-left"><?= $d['Spec']; ?></td>
                    <td><?= $d['Kontak']; ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="/poliklinik/dokter/update/<?= $d['Id_Dokter']; ?>" id="example" data-toggle="tooltip" data-placement="top" title="Update" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="/poliklinik/dokter/detail/<?= $d['Id_Dokter']; ?>" data-toggle="tooltip" data-placement="top" title="Search" class="btn btn-warning btn-sm text-white"><i class="fas fa-search"></i></a>
                        <a href="/poliklinik/dokter/delete/<?= $d['Id_Dokter']; ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm btn-hapus"><i class="far fa-trash-alt"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!-- method links berparameter 2 yaitu nama_table, nama_variabel_template_pagination=>|yang ada di config pager variabel template| -->
            <?= $pager->links('dokter', 'pagination'); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>