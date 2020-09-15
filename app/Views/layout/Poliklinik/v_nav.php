<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?= base_url(); ?>/assets/img/icon-img/ardi.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">Muhamad Ardi Nur Insan</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Dashboard start -->
      <li class="nav-item has-treeview menu-close">
        <!-- 2 condition => condition and condition ? ' ' : ' ' -->
        <a href="/Poliklinik" class="nav-link <?= ($methodName == '/dashboard') ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <!-- Dashboard end -->

      <!-- Poliklinik start -->
      <li class="nav-item has-treeview <?= ($methodName == '/dashboard') ? 'menu-close' : 'menu-open'; ?>">
        <a href="#" class="nav-link <?= ($methodName != '/poliklinik' and $methodName != '/spesialis' and $methodName != '/dokter' and $title != 'Create Pasien') ? '' : 'active'; ?>">
          <i class="nav-icon fas fa-clinic-medical"></i>
          <p>
            Poliklinik
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/Poliklinik/Pasien" class="nav-link <?= ($methodName != '/poliklinik') ? '' : 'active'; ?>">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>Pasien</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/Poliklinik/Spesialis" class="nav-link <?= ($methodName == '/spesialis') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-nurse"></i>
              <p>Spesialis</p>
            </a>
          </li>
        </ul>
      </li>
      <!-- Poliklinik end -->
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-8">
          <h1 class="m-0 text-dark"><strong><?= $judul; ?></strong></h1>
        </div><!-- /.col -->
        <!-- <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"></li>
          </ol>
        </div>/.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">