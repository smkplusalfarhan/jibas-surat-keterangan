<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $jumlah_surat ?></h3>

                            <p>Surat Keterangan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="<?php echo base_url('surat') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $jumlah_siswa ?></sup></h3>

                            <p>Peserta Didik Aktif</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-university"></i>
                        </div>
                        <a href="<?php echo base_url('siswa') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $jumlah_rombel ?></h3>

                            <p>Rombongan Belajar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-android-home"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-sm-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $jumlah_pengguna ?></h3>

                            <p>Pengguna</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- ./col -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Identitas Sekolah
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dd class="col-sm-4">Nama Sekolah</dd>
                                <dd class="col-sm-8"><?php echo $setting->nama_sekolah ?></dd>
                                <dd class="col-sm-4">NPSN</dd>
                                <dd class="col-sm-8"><?php echo $setting->npsn_sekolah ?></dd>
                                <dd class="col-sm-4">Alamat</dd>
                                <dd class="col-sm-8"><?php echo $setting->alamat_sekolah ?></dd>
                                <dd class="col-sm-4">Kecamatan</dd>
                                <dd class="col-sm-8"><?php echo $setting->kecamatan_sekolah ?></dd>
                                <dd class="col-sm-4">Kabupaten</dd>
                                <dd class="col-sm-8"><?php echo $setting->kabupaten_sekolah ?></dd>
                                <dd class="col-sm-4">Kepala Sekolah</dd>
                                <dd class="col-sm-8"><?php echo $setting->kepala_sekolah ?></dd>
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Informasi Aplikasi
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <dd class="col-sm-4">Nama Aplikasi</dd>
                                <dd class="col-sm-8">surKet (Surat Keterangan)</dd>
                                <dd class="col-sm-4">Versi Aplikasi</dd>
                                <dd class="col-sm-8">1.0</dd>
                                <dd class="col-sm-4">Versi Database</dd>
                                <dd class="col-sm-8">1.0</dd>
                                <dd class="col-sm-4">Database Jibas</dd>
                                <dd class="col-sm-8">22.0</dd>
                                <dd class="col-sm-4">Developer Aplikasi</dd>
                                <dd class="col-sm-8">Dede Iskandar </dd>
                                <dd class="col-sm-4">{Periode aktif}</dd>
                                <dd class="col-sm-8"><?php echo $setting->periode_aktif ?></dd>
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Aplikasi <strong>Surat Keterangan</strong> ini dibuat dan dikembangkan untuk memudahkan pembuatan Surat Keterangan Siswa dengan integrasi<br>
                        sumber basis data aplikasi <a href="http://jibas.net"><strong>JIBAS</strong></a> (Jaringan Informasi Bersama Antar Sekolah). </p>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->