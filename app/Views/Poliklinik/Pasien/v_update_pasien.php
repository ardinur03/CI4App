<section id="update-pasien">
  <div class="container">
    <div class="row justify-content-center bg-light">
      <div class="col-6">
        <form action="<?php echo base_url('/Poliklinik/Pasien/Proses_update/' . $pasien['Id_Pasien']); ?>" method="POST">
          <?= csrf_field(); ?>
          <div class="form-group">
            <label for="pasien" class="col-form-label">Id Pasien :</label>
            <div class="input-group">
              <input type="text" name="Id_Pasien" value="<?= $pasien['Id_Pasien'] ?>" class="form-control" id="pasien" readonly>
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="namapasien" class="col-form-label">Nama Pasien :</label>
            <input type="text" name="Nama_Pasien" class="form-control <?= ($validation->hasError('Nama_Pasien')) ? 'is-invalid' : ''; ?>" value="<?= (old('Nama_Pasien')) ? old('Nama_Pasien') : $pasien['Nama_Pasien'] ?>" id="namapasien">
            <div class="invalid-feedback">
              <?= $validation->getError('Nama_Pasien'); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-form-label">Jenis Kelamin :</label> <br>
            <input type="radio" name="Gender" class=" <?= ($validation->hasError('Gender')) ? 'is-invalid' : ''; ?>" value="M" <?= $jk = ($pasien['Gender'] == "M") ? "checked = 'checked'" : ""; ?>> L<br>
            <input type="radio" name="Gender" class=" <?= ($validation->hasError('Gender')) ? 'is-invalid' : ''; ?>" value="W" <?= $jk = ($pasien['Gender'] == "W") ? "checked = 'checked'" : ""; ?>> P
            <div class="invalid-feedback">
              <?= $validation->getError('Gender'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="alamatdetail" class="col-form-label">Alamat Detail :</label>
            <textarea name="Alamat_Detail" class="form-control <?= ($validation->hasError('Alamat_Detail')) ? 'is-invalid' : ''; ?>" cols="10" value="<?= old('Alamat_Detail'); ?>" rows="5"><?= (old('Alamat_Detail')) ? old('Alamat_Detail') : $pasien['Alamat_Detail'] ?></textarea>
            <div class="invalid-feedback">
              <?= $validation->getError('Alamat_Detail'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="alamatkelurahan" class="col-form-label">Alamat Kelurahan :</label>
            <input type="text" name="Alamat_Kelurahan" class="form-control <?= ($validation->hasError('Alamat_Kelurahan')) ? 'is-invalid' : ''; ?>" value="<?= (old('Alamat_Kelurahan')) ? old('Alamat_Kelurahan') : $pasien['Alamat_Kelurahan'] ?>" id="alamatkelurahan">
            <div class="invalid-feedback">
              <?= $validation->getError('Alamat_Kelurahan'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="alamatkecamatan" class="col-form-label">Alamat Kecamatan :</label>
            <input type="text" name="Alamat_Kecamatan" class="form-control <?= ($validation->hasError('Alamat_Kecamatan')) ? 'is-invalid' : ''; ?>" value="<?= (old('Alamat_Kecamatan')) ? old('Alamat_Kecamatan') : $pasien['Alamat_Kecamatan'] ?>" id="alamatkecamatan">
            <div class="invalid-feedback">
              <?= $validation->getError('Alamat_Kecamatan'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="alamatkota" class="col-form-label">Alamat Kota/Kab :</label>
            <input type="text" name="Alamat_KotaKab" class="form-control <?= ($validation->hasError('Alamat_KotaKab')) ? 'is-invalid' : ''; ?>" value="<?= (old('Alamat_KotaKab')) ? old('Alamat_KotaKab') : $pasien['Alamat_KotaKab'] ?>" id="alamatkota">
            <div class="invalid-feedback">
              <?= $validation->getError('Alamat_KotaKab'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="tempat-lahir" class="col-form-label">Tempat Lahir :</label>
            <input type="text" name="Tmp_Lahir" class="form-control <?= ($validation->hasError('Tmp_Lahir')) ? 'is-invalid' : ''; ?>" value="<?= (old('Tmp_Lahir')) ? old('Tmp_Lahir') : $pasien['Tmp_Lahir'] ?>" id="tempat-lahir">
            <div class="invalid-feedback">
              <?= $validation->getError('Tmp_Lahir'); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="tanggal-lahir" class="col-form-label">Tanggal Lahir :</label>
            <input type="date" name="Tgl_Lahir" class="form-control <?= ($validation->hasError('Tgl_Lahir')) ? 'is-invalid' : ''; ?>" value="<?= $pasien['Tgl_Lahir']; ?>" value="<?= (old('Tgl_Lahir')) ? old('Tgl_Lahir') : $pasien['Tgl_Lahir'] ?>" id="tanggal-lahir">
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
  </div>
</section>