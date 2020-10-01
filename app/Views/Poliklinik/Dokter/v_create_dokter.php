<section id="create-dokter">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 md-9">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Dokter</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" action="/Poliklinik/Dokter/Store" method="POST">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="row">

                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="kodeDokter">Kode Dokter</label>
                    <input type="text" name="Id_Dokter" class="form-control" id="kodeDokter" placeholder="Masukan kode dokter" value="<?= old('Id_Dokter'); ?>">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">

                    <label for="kodeSpec">Kode Spec</label>
                    <select name="Id_Spec" id="kodeSpec" class="form-control">
                      <option value="">No Selected</option>
                      <?php foreach ($spesialis as $d) : ?>
                        <option value="<?= $d['Id_Spec']; ?>"><?= $d['Id_Spec'];  ?> - <?= $d['Spec']; ?></option>
                      <?php endforeach; ?>
                    </select>

                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="nameDokter">Nama Dokter</label>
                <input type="text" name="Nama_Dokter" class="form-control" id="nameDokter" placeholder="Nama dokter">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-5">
                    <label for="JK">Jenis Kelamin</label><br>
                    <input id="JK" type="radio" name="Gender" class="" value="M"> L<br>
                    <input type="radio" name="Gender" class="" value="W"> P
                  </div>
                  <div class="col-sm-7">
                    <label for="noHp">No HP</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">+62</div>
                      </div>
                      <input type="number" name="Kontak" class="form-control" id="noHp" placeholder="No Hp" min="0">
                      <small class="text-red">*Tuliskan Awalan no hp dengan 0</small>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <div class="container">
                <div class="row  justify-content-end">
                  <div class="form-group">
                    <a href="/Poliklinik/Dokter" class="btn btn-secondary btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
                    <button type="reset" class="btn btn-warning text-white btn-sm"><i class="fas fa-redo-alt"></i> Reset</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</section>