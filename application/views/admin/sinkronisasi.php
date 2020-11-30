<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Sinkronisasi JIBAS</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Sinkronisasi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
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
                                Status Koneksi : <span class="text-success text-bold">CONNECTED</span>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <dl class="row">
                                <div class="col-12 text-center">
                                    <br><br>
                                    <p class="text-center">Sinkronisasi terakhir <?php echo $setting->sinkron ?></p>
                                    <a href="<?php echo base_url() ?>sinkronisasi/sinkron" class="btn btn-success btn-lg"><i class="nav-icon fas fa-sync"></i> Sinkronisasi</a>
                                    <br><br><br>
                                </div>
                            </dl>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->

            </div>

            <div class="row">


            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Database</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Table</th>
                                        <th style="width: 180px">Jibas</th>
                                        <th style="width: 180px">Aplikasi</th>
                                        <th style="width: 180px">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Tahun Ajaran</td>
                                        <td><?php echo $jumlah_tahun_ajaran_jibas ?></td>
                                        <td><?php echo $jumlah_tahun_ajaran_aplikasi ?></td>
                                        <td>
                                        <?php echo $jumlah_tahun_ajaran_aplikasi >= $jumlah_tahun_ajaran_jibas ? '<span class="badge bg-success">lengkap</span>' : '<span class="badge bg-primary">kurang</span>'; ?>
                                        </td>
                                    </tr>
                                    <?php

                                    ?>
                                    <tr>
                                        <td>2.</td>
                                        <td>Rombel</td>
                                        <td><?php echo $jumlah_rombel_jibas ?></td>
                                        <td><?php echo $jumlah_rombel_aplikasi ?></td>
                                        <td>
                                            <?php echo $jumlah_rombel_aplikasi >= $jumlah_rombel_jibas ? '<span class="badge bg-success">lengkap</span>' : '<span class="badge bg-primary">kurang</span>'; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Peserta Didik</td>
                                        <td><?php echo $jumlah_siswa_jibas ?></td>
                                        <td><?php echo $jumlah_siswa_aplikasi ?></td>
                                        <td>
                                            <?php echo $jumlah_siswa_aplikasi >= $jumlah_siswa_jibas ? '<span class="badge bg-success">lengkap</span>' : '<span class="badge bg-primary">kurang</span>'; ?>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->