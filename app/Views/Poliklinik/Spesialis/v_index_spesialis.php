<section id="table-spesialis">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Data Spesialis</h3>
      </div>
      <div class="row mt-3 ml-5">
        <div class="col-md-3">
          <form action="" method="POST">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Masukan Spesialis ..." name="keyword">
              <div class="input-group-append">
                <button class="btn btn-outline-dark bg-light" type="submit" name="submit"><i class="fas fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-3 ml-auto">
          <a href="#" data-toggle="modal" data-target="#modalInsert" class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Spesialis</a>
        </div>
      </div>

      <!-- SweetAlert start -->
      <div class="swal" data-swal="<?= session()->get('message_success'); ?>"></div>
      <div class="inf" data-swal="<?= session()->get('message_info'); ?>"></div>
      <!-- SweetAlert end -->

      <div class="container">
        <div class="row">
          <div class="col-md-11 ml-5">
            <table class="table table-hover">
              <thead>
                <tr class=" bg-primary">
                  <th scope="col">No</th>
                  <th scope="col">Kode Spesialis</th>
                  <th scope="col">Spesialis</th>
                  <th scope="colgroup">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1 + (5 * ($currentPage - 1)); ?>
                <?php foreach ($spesialis as $s) : ?>
                  <tr class="text-center">
                    <td scope="row"><?= $no++; ?></td>
                    <td><?= $s['Id_Spec']; ?></td>
                    <td><?= $s['Spec']; ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="/poliklinik/spesialis/update/<?= $s['Id_Spec']; ?>" id="example" data-toggle="tooltip" data-placement="left" title="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="/Poliklinik/Spesialis/detail/<?= $s['Id_Spec']; ?>" data-toggle="tooltip" data-placement="top" title="Detail" class="btn btn-warning btn-sm text-white"><i class="fas fa-search"></i></a>
                        <a href="/Poliklinik/Spesialis/delete/<?= $s['Id_Spec']; ?>" data-toggle="tooltip" data-placement="right" title="Delete" class="btn btn-danger btn-sm btn-hapus"><i class="far fa-trash-alt"></i></a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?= $pager->links('spesialis', 'pagination'); ?>
          </div>
        </div>
      </div>

      <!-- Modal Insert Start -->
      <div class="modal fade" id="modalInsert" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Spesialis</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="container mt-3">
              <form action="/Poliklinik/Spesialis/Store" method="POST">
                <?= csrf_field(); ?>
                <div class="form-group">
                  <label for="kode_spesialis">Kode Spesialis</label>
                  <input type="text" class="form-control <?= ($validation->hasError('Id_Spec')) ? 'is-invalid' : ''; ?>" id="kode_spesialis" name="Id_Spec" value="<?= old('Id_Spec'); ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('Id_Spec'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="spesialis">Spesialis</label>
                  <input type="text" class="form-control <?= ($validation->hasError('Spec')) ? 'is-invalid' : ''; ?>" id="spesialis" name="Spec" value="<?= old('Spec'); ?>">
                  <div class="invalid-feedback">
                    <?= $validation->getError('Spec'); ?>
                  </div>
                </div>
            </div>
            <div class="modal-footer mt-5">
              <button type="button" class="btn btn-secondary btn-sm text-white" data-dismiss="modal"><i class="fas fa-chevron-circle-left"></i> Close</button>
              <button type="reset" class="btn btn-warning btn-sm text-white"><i class="fas fa-redo-alt"></i> Reset Data</button>
              <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Save</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal Insert Start -->
    </div>

  </div>
</section>