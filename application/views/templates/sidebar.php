<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <span class="nav-link">Aplikasi Surat Keterangan</span>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>" class="brand-link">
        <span class="brand-text font-weight-light ml-3">SMK Plus Al-Farhan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo base_url(); ?>assets/images/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $this->ion_auth->user()->row()->first_name; ?> <?php echo $this->ion_auth->user()->row()->last_name; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-header">PENGGUNA</li>
                <li class="nav-item">
                    <a href="<?php echo base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard') {
                                                                                            echo 'active';
                                                                                        } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashborad
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('siswa'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'siswa') {
                                                                                        echo 'active';
                                                                                    } ?>">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Referensi Peserta Didik
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('sinkronisasi') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'sinkronisasi') {
                                                                                                echo 'active';
                                                                                            } ?>">
                        <i class="nav-icon fas fa-sync"></i>
                        <p>
                            Sinkronisasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('surat'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'surat') {
                                                                                        echo 'active';
                                                                                    } ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Surat Keterangan
                        </p>
                    </a>
                </li>
                <?php if ($this->ion_auth->is_admin()) { ?>
                    <li class="nav-header">ADMINISTRATOR</li>

                    <li class="nav-item">
                        <a href="<?php echo base_url('setting') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'setting') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>
                                Pengaturan Umum
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="<?php echo base_url('auth') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'auth') {
                                                                                            echo 'active';
                                                                                        } ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Pengguna
                            </p>
                        </a>
                    </li>

                <?php } ?>

                <li class="nav-header">APLIKASI</li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>Auth/logout" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->