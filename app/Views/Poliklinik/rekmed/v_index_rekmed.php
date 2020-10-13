<section id="tabel-rekmed">
  <div class="container">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Data Rekam Medis</h3>
      </div>

      <div class="row mt-3 ml-5">
        <div class="col-3">
          <form action="" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukan Rekmed ..." name="keyword">
              <div class="input-group-append">
                <button class="btn btn-outline-dark bg-light" type="submit" name="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-3 ml-auto">
          <a href="/poliklinik/rekmed/create" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Rekmed</a>
        </div>
      </div>

      <!-- SweetAlert start -->
      <div class="swal" data-swal="<?= session()->get('message_success'); ?>"></div>
      <div class="inf" data-swal="<?= session()->get('message_info'); ?>"></div>
      <!-- SweetAlert end -->

      <div class="container">
        <div class="row">
          <div class="col-12 ml-3">
            <table class="table table-responsive table-sm table-hover">
              <thead class="table-secondary">
                <tr>
                  <th scope="row">No</th>
                  <th scope="col">Nama Dokter</th>
                  <th scope="col">Nama Pasien</th>
                  <th scope="col">Tanggal Periksa</th>
                  <th scope="col">Gejala</th>
                  <th scope="col">Diagnosa</th>
                  <th scope="col">Terapi</th>
                  <th scope="colgroup">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($rekmed as $r) : ?>
                  <tr>
                    <td scope="col"><?= $no++; ?></td>
                    <td class="text-left"><?= $r['Nama_Dokter']; ?></td>
                    <td class="text-left"><?= $r['Nama_Pasien']; ?></td>
                    <td class="text-left"><?= $r['Tgl_periksa']; ?></td>
                    <td class="text-left"><?= $r['Gejala']; ?></td>
                    <td class="text-left"><?= $r['Diagnosa']; ?></td>
                    <td class="text-left"><?= $r['Terapi']; ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="<?= base_url('poliklinik/rekmed/update/' . $r['Id_Rekmed']); ?>" data-toggle="tooltip" data-placement="left" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-sm text-white"><i class="fas fa-search"></i></a>
                        <a href="<?= base_url('poliklinik/rekmed/delete/' . $r['Id_Rekmed']); ?>" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm btn-hapus"><i class="far fa-trash-alt"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <!-- method links berparameter 2 yaitu nama_table, nama_variabel_template_pagination=>|yang ada di config pager variabel template| -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>