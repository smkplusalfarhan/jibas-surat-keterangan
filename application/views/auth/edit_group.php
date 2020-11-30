<div class="wrapper">

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

            <!-- Main content -->
            <div class="content">
                  <div class="container-fluid">
                        <div class="row">
                              <div class="col-lg-12">
                                    <!-- Horizontal Form -->
                                    <div class="card card-success mt-4">
                                          <div class="card-header">
                                                <h3 class="card-title"><?php echo lang('edit_user_heading'); ?></h3>
                                          </div>
                                          <!-- /.card-header -->
                                          <?php echo form_open(current_url()); ?>


                                          <div id="infoMessage"><?php echo $message; ?></div>


                                          <div class="card-body">
                                                <div class="form-group row">
                                                      <label for="group_name" class="col-sm-3 col-form-label">Nama Depan</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($group_name); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="group_description" class="col-sm-3 col-form-label">Nama Belakang</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($group_description); ?>
                                                      </div>
                                                </div>

                                          </div>

                                          <div class="card-footer">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <button type="reset" class="btn btn-default float-right">Reset</button>
                                          </div>
                                          <!-- /.card-footer -->

                                          <?php echo form_close(); ?>
                                    </div>
                                    <!-- /.card -->
                              </div>
                        </div>
                        <!-- /.row -->
                  </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->