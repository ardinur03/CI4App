<section id="create-pasien">
  <div class="container bg-light">
    <div class="col-12">
      <form action="/poliklinik/pasien/store" method="POST">
        <?= csrf_field(); ?>
        <div class="form-group">
          <label for="pasien" class="col-form-label">Id Pasien :</label>
          <input type="text" name="Id_Pasien" class="form-control <?= ($validation->hasError('Id_Pasien')) ? 'is-invalid' : ''; ?>" id="pasien" value="<?= old('Id_Pasien'); ?>" autofocus>
          <div class="invalid-feedback">
            <?= $validation->getError('Id_Pasien'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="nama" class="col-form-label">Nama Pasien :</label>
          <input type="text" name="Nama_Pasien" value="<?= old('Nama_Pasien'); ?>" class="form-control <?= ($validation->hasError('Nama_Pasien')) ? 'is-invalid' : ''; ?>" id="pasien" value="<?= old('Nama_Pasien'); ?>" id="nama">
          <div class="invalid-feedback">
            <?= $validation->getError('Nama_Pasien'); ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-form-label">Jenis Kelamin :</label> <br>
          <input type="radio" name="Gender" class=" <?= ($validation->hasError('Gender')) ? 'is-invalid' : ''; ?>" value="M"> L<br>
          <input type="radio" name="Gender" class=" <?= ($validation->hasError('Gender')) ? 'is-invalid' : ''; ?>" value="W"> P
          <div class="invalid-feedback">
            <?= $validation->getError('Gender'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="alamatdetail" class="col-form-label">Alamat Detail :</label>
          <textarea name="Alamat_Detail" class="form-control <?= ($validation->hasError('Alamat_Detail')) ? 'is-invalid' : ''; ?>" cols="10" rows="5"><?= old('Alamat_Detail'); ?></textarea>
          <div class="invalid-feedback">
            <?= $validation->getError('Alamat_Detail'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="alamatkelurahan" class="col-form-label">Alamat Kelurahan :</label>
          <input type="text" name="Alamat_Kelurahan" value="<?= old('Alamat_Kelurahan'); ?>" class="form-control <?= ($validation->hasError('Alamat_Kelurahan')) ? 'is-invalid' : ''; ?>" id="alamatkelurahan">
          <div class="invalid-feedback">
            <?= $validation->getError('Alamat_Kelurahan'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="alamatkecamatan" class="col-form-label">Alamat Kecamatan :</label>
          <input type="text" name="Alamat_Kecamatan" value="<?= old('Alamat_Kecamatan'); ?>" class="form-control <?= ($validation->hasError('Alamat_Kecamatan')) ? 'is-invalid' : ''; ?>" id="alamatkecamatan">
          <div class="invalid-feedback">
            <?= $validation->getError('Alamat_Kecamatan'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="alamatkota" class="col-form-label">Alamat Kota/Kab :</label>
          <input type="text" name="Alamat_KotaKab" value="<?= old('Alamat_KotaKab'); ?>" class="form-control <?= ($validation->hasError('Alamat_KotaKab')) ? 'is-invalid' : ''; ?>" id="alamatkota">
          <div class="invalid-feedback">
            <?= $validation->getError('Alamat_KotaKab'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="tempat-lahir" class="col-form-label">Tempat Lahir :</label>
          <input type="text" name="Tmp_Lahir" value="<?= old('Tmp_Lahir'); ?>" class="form-control <?= ($validation->hasError('Tmp_Lahir')) ? 'is-invalid' : ''; ?>" id="tempat-lahir">
          <div class="invalid-feedback">
            <?= $validation->getError('Tmp_Lahir'); ?>
          </div>
        </div>
        <div class="form-group">
          <label for="tanggal-lahir" class="col-form-label">Tanggal Lahir :</label>
          <input type="date" name="Tgl_Lahir" value="<?= old('Tgl_Lahir'); ?>" class="form-control <?= ($validation->hasError('Tgl_Lahir')) ? 'is-invalid' : ''; ?>" id="tanggal-lahir">
          <div class="invalid-feedback">
            <?= $validation->getError('Tgl_Lahir'); ?>
          </div>
        </div>
        <div class="form-group">
          <a href="/poliklinik/pasien" class="btn btn-secondary btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
          <button type="reset" class="btn btn-warning btn-sm text-white"><i class="fas fa-redo-alt"></i> Reset Data</button>

          <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</section>