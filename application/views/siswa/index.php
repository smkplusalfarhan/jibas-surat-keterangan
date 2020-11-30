<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Referensi Peserta Didik</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Peserta Didik</li>
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
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-info"></i>Database JIBAS</h5>
                        Penambahan dan perbaikan data hanya bisa dilakukan melalui aplikasi JIBAS. Selalu lakukan sinkronisasi
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                            <div class="card-tools">
                            </div>
                        </div>
                        <!-- /.card-header -->

                        <div class=" card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Rombel</th>
                                                <th>NIPD</th>
                                                <th>Nama</th>
                                                <th>L/P</th>
                                                <th>Nama ortu/wali</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($siswa as $item) { ?>

                                                <tr>
                                                    <td><?php echo $item->nama_rombel ?></td>
                                                    <td><?php echo $item->nipd ?></td>
                                                    <td><?php echo $item->nama ?></td>
                                                    <td><?php echo $item->lp ?></td>
                                                    <td><?php echo $item->ayah . ' / ' . $item->ibu ?></td>
                                                    <td><?php echo $item->alamat ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('siswa/delete/') . $item->id ?>" class="text-muted ml-2" onclick="return confirm('Yakin mau dihapus?')">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php } ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Rombel</th>
                                                <th>NIPD</th>
                                                <th>Nama</th>
                                                <th>L/P</th>
                                                <th>Nama ortu/wali</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->