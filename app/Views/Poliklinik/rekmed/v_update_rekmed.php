<section id="tabel-rekmed">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-11 col-md-12 col-sm-10">

        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Data Rekmed</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url('/poliklinik/rekmed/proses_update/' . $rekmed['Id_Rekmed']); ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="card-body shadow-sm">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label for="kodeRekmed">Kode Rekmed</label>
                      <div class="input-group">
                        <input type="text" name="Id_Rekmed" class="form-control" id="kodeRekmed" value="<?= $rekmed['Id_Rekmed'] ?>" width="50px" readonly>
                        <div class="input-group-prepend" style="height: 38px;">
                          <div class="input-group-text"><span class="badge badge-white"><a type="button" class="btn btn-bg-white muncul" data-toggle="popover" title="Penginputan kode rekmed" data-content="Pengisian ini otomatis di isi oleh sistem"><i class="fas fa-info-circle text-warning"></i></a></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="kodeDktr">Kode Dokter & Nama Dokter</label>
                      <select name="Id_Dokter" id="kodeDktr" aria-describedby="dokValidate" class="form-control <?= ($validation->hasError('Id_Dokter')) ? 'is-invalid' : ''; ?>" value="<?= old('Id_Dokter'); ?>">
                        <option value="">No Selected</option>
                        <?php foreach ($dokter as $d) : ?>
                          <option <?= ($d['Id_Dokter'] != $rekmed['Id_Dokter']) ? '' : 'selected'; ?> value="<?= $d['Id_Dokter']; ?>"><?= $d['Id_Dokter'] .  " | " . $d['Nama_Dokter'] ?></option>
                        <?php endforeach; ?>
                      </select>
                      <div id="dokValidate" class="invalid-feedback">
                        <?= $validation->getError('Id_Dokter'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="form-group">
                      <label for="kodePas">Kode Pasien & Nama Pasien</label>
                      <select name="Id_Pasien" id="kodePas" class="form-control <?= ($validation->hasError('Id_Pasien')) ? 'is-invalid' : ''; ?>" value="<?= old('Id_Pasien'); ?>">
                        <option value="">No Selected</option>
                        <?php foreach ($pasien as $p) : ?>
                          <option <?= ($p['Id_Pasien'] != $rekmed['Id_Pasien']) ? '' : 'selected'; ?> value="<?= $p['Id_Pasien']; ?>"><?= $p['Id_Pasien'] . " | "  . $p['Nama_Pasien'] ?> </option>
                        <?php endforeach; ?>
                      </select>
                      <div id="dokValidate" class="invalid-feedback">
                        <?= $validation->getError('Id_Pasien'); ?>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="tglPr">Tanggal Periksa</label>
                      <input type="date" name="Tgl_periksa" class="form-control <?= ($validation->hasError('Tgl_periksa')) ? 'is-invalid' : ''; ?>" value="<?= old('Tgl_periksa'); ?>" id="tglPr" placeholder="Masukan Tanggal periksa..." value="<?= old('Tgl_periksa'); ?>">
                      <div id="dokValidate" class="invalid-feedback">
                        <?= $validation->getError('Tgl_periksa'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="gejala">Gejala</label>
                      <input type="text" name="Gejala" class="form-control <?= ($validation->hasError('Gejala')) ? 'is-invalid' : ''; ?>" id="gejala" placeholder="Masukan Gejala" value="<?= old('Gejala') ? old('Gejala') : $rekmed['Gejala']; ?>">
                      <div id="dokValidate" class="invalid-feedback">
                        <?= $validation->getError('Gejala'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="diagnosa">Diagnosa</label>
                      <input type="text" name="Diagnosa" class="form-control <?= ($validation->hasError('Diagnosa')) ? 'is-invalid' : ''; ?>" id="diagnosa" placeholder="Masukan Diagnosa..." value="<?= old('Diagnosa') ? old('Diagnosa') : $rekmed['Diagnosa']; ?>">
                      <div id="dokValidate" class="invalid-feedback">
                        <?= $validation->getError('Diagnosa'); ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label for="terapi">Terapi</label>
                      <input type="text" name="Terapi" class="form-control <?= ($validation->hasError('Terapi')) ? 'is-invalid' : ''; ?>" id="terapi" placeholder="Masukan Terapi..." value="<?= old('Terapi') ? old('Terapi') : $rekmed['Terapi']; ?>">
                      <div id="dokValidate" class="invalid-feedback">
                        <?= $validation->getError('Terapi'); ?>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="card-footer">
              <div class="container mb-1 mt-1">
                <div class="row  justify-content-end">
                  <div class="form-group">
                    <a href="/poliklinik/rekmed" class="btn btn-secondary btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
                    <button type="reset" class="btn btn-warning text-white btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- </form> -->
            <?= form_close(); ?>

        </div>
      </div>
    </div>
  </div>
</section>