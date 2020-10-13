<section id="detail-spesialis">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="card text-center">
          <div class="card-header bg-primary mb-2">
            <ul class="nav nav-pills card-header-pills">
              <h4 style="color: white;">Detail Spesialis</h4>
            </ul>
          </div>
          <div class="card-body">
            <table border="0">
              <tr>
                <td>Kode Spesialis</td>
                <td> :</td>
                <td><?= $spesialis['Id_Spec']; ?></td>
              </tr>
              <tr>
                <td>Nama Spesialis</td>
                <td> :</td>
                <td><?= $spesialis['Spec']; ?></td>
              </tr>
            </table>
            <div class="col-md-12">
              <a href="/Poliklinik/Spesialis" class="btn btn-secondary btn-sm"><i class="fas fa-chevron-circle-left"></i> Back</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>