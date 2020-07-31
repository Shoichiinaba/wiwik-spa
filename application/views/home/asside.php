<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link">
    <img src="<?= base_url('assets/img/') ?>logspa.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
    <span class="brand-text font-weight-light">Wiwiek SPA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= $this->fungsi->user_login()->photo_karyawan ? base_url('assets/img/karyawan/') . $this->fungsi->user_login()->photo_karyawan : base_url('assets/img/karyawan/default.png') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= site_url('profil') ?>" class="d-block"><?= $this->fungsi->user_login()->nama_karyawan ?></a>
        <small>
          <span class="d-block text-gray"><?= $this->fungsi->user_login()->nama_level ?></span>
        </small>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
        <?php if ($this->session->userdata('level') == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>" class="nav-link <?= $this->uri->segment(1) == '' | $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- Pelanggan -->
            <li class="nav-item">
                <a href="<?= site_url('pelanggan') ?>" class="nav-link <?= $this->uri->segment(1) == 'pelanggan' ? 'active' : '' ?>">
                  <i class="nav-icon fas fa-cubes"></i>
                  <p>Pelanggan</p>
              </a>
            </li>
          <!-- Terapis -->
          <li class="nav-item">
            <a href="<?= site_url('Terapis') ?>" class="nav-link <?= $this->uri->segment(1) == 'Terapis' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-male"></i>
              <p>Terapis</p>
            </a>
          </li>
          <!-- jasa -->
          <li class="nav-item">
            <a href="<?= site_url('jasa') ?>" class="nav-link <?= $this->uri->segment(1) == 'jasa' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>Jasa</p>
           </a>
        </li>
          <!-- Barang -->
          <li class="nav-item">
            <a href="<?= site_url('barang') ?>" class="nav-link <?= $this->uri->segment(1) == 'barang' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>Barang</p>
           </a>
        </li>
          <!-- Laporan -->
          <li class="nav-item">
            <a href="<?= site_url('Laporan') ?>" class="nav-link <?= $this->uri->segment(1) == 'Laporan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Laporan</p>
            </a>
          </li>
          <!-- User -->
          <li class="nav-item">
            <a href="<?= site_url('User') ?>" class="nav-link <?= $this->uri->segment(1) == 'User' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>User</p>
            </a>
          </li>
          <!-- keluar -->
          <li class="nav-item">
            <a href="<?= site_url('auth/logout') ?>" class="nav-link tombol-keluar">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p> Kaluar </p>
            </a>
          </li>
        <?php } ?>
       
        <?php if ($this->session->userdata('level') == 2) { ?>
         <!-- Pelanggan -->
        <li class="nav-item">
            <a href="<?= site_url('pelanggan') ?>" class="nav-link <?= $this->uri->segment(1) == 'pelanggan' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>Pelanggan</p>
           </a>
        </li>
        <!-- Kasir -->
        <li class="nav-item">
            <a href="<?= site_url('kasir') ?>" class="nav-link <?= $this->uri->segment(1) == 'kasir' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>Kasir</p>
           </a>
        </li>
        <!-- Jasa -->
        <li class="nav-item">
            <a href="<?= site_url('jasa') ?>" class="nav-link <?= $this->uri->segment(1) == 'jasa' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cubes"></i>
              <p>Jasa</p>
           </a>
        </li>
        <!-- keluar -->
        <li class="nav-item">
          <a href="<?= site_url('auth/logout') ?>" class="nav-link tombol-keluar">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p> Kaluar </p>
          </a>
        </li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</aside>