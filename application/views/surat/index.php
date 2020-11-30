<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Surat Keterangan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah">
                        <!-- <i class="fas fa-plus mr-2"></i> -->
                        Tambah Surat Keterangan
                    </button>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">
                            </h3>
                            <div class="card-tools">

                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keperluan</th>
                                        <th>Periode</th>
                                        <th>Rombel</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama Ortu/wali</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surat as $item) { ?>
                                        <tr>
                                            <td><?php echo $item->tanggal_surat ?></td>
                                            <td><?php echo $item->keperluan ?></td>
                                            <td><?php echo $item->periode ?></td>
                                            <td><?php echo $item->rombel ?></td>
                                            <td><?php echo $item->nama ?></td>
                                            <td><?php echo $item->ayah ?> / <?php echo $item->ibu ?></td>
                                            <td><?php echo $item->alamat ?></td>
                                            <td>
                                                <a href="<?php echo base_url('surat/pdf/') . $item->surat_id ?>" class="text-muted">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                <a href="<?php echo base_url('surat/delete/') . $item->surat_id ?>" class="text-muted ml-2" onclick="return confirm('Yakin mau menghapus Surat Keterangan?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keperluan</th>
                                        <th>Periode</th>
                                        <th>Rombel</th>
                                        <th>Nama Siswa</th>
                                        <th>Nama Ortu/wali</th>
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

<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Surat Keterangan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('surat/index') ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="rombel" class="col-sm-4 col-form-label">Rombel</label>
                        <div class="col-sm-8">
                            <select name="rombel" id="rombel" class="form-control">
                                <option value="0"> - Pilih salah satu - </option>
                                <?php foreach ($rombel as $row) : ?>
                                    <option value="<?php echo $row->id; ?>"><?php echo $row->nama_rombel; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="selectSiswa" class="col-sm-4 col-form-label">Peserta Didik</label>
                        <div class="col-sm-8">
                            <select name="siswa_id" id="keperluan" class="student form-control">
                                <option value=""> - Pilih salah satu - </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keperluan" class="col-sm-4 col-form-label">Untuk Keperluan</label>
                        <div class="col-sm-8">
                            <input name="keperluan" id="keperluan" class="form-control" value="Program Keluarga Harapan (PKH)">
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-end">
                    <button type="submit" class="btn btn-info">Buat Surat Keterangan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->



    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->