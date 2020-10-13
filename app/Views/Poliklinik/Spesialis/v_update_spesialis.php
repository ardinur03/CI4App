<section id="update-spesialis">
  <div class="container">
    <div class="row justify-content-center mt-3">
      <div class="col-md-4">
        <form action="<?= base_url('/Poliklinik/Spesialis/proses_update/ ' . $spesialis['Id_Spec']); ?>" method="POST">
          <?= csrf_field(); ?>
          <div class="form-group">
            <input type="hidden" name="Id_Spec" value="<?= $spesialis['Id_Spec']; ?>">
            <label>Kode Spesialis</label>
            <div class="input-group">
              <input type="text" class="form-control" value="<?= (old('Id_Spec')) ? old('Id_Spec') : $spesialis['Id_Spec']; ?>" disabled>
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" class="form-control <?= ($validation->hasError('Spec')) ? 'is-invalid' : ''; ?>" id="spesialis" name="Spec" value="<?= $spesialis['Spec']; ?>">
            <div class="invalid-feedback">
              <?= $validation->getError('Spec'); ?>
            </div>
          </div>
          <div class="form-group">
            <a href="/Poliklinik/Spesialis" type="button" class="btn btn-secondary btn-sm text-white" data-dismiss="modal"><i class="fas fa-chevron-circle-left"></i> Back</a>
            <button type="reset" class="btn btn-warning btn-sm text-white"><i class="fas fa-redo-alt"></i> Reset Data</button>
            <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>