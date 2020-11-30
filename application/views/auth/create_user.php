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
                                                <h3 class="card-title">Tambah Pengguna</h3>
                                          </div>

                                          <div class="card-body">

                                                <div id="infoMessage"><?php echo $message; ?></div>

                                                <?php echo form_open("auth/create_user"); ?>

                                                <div class="form-group row">
                                                      <label for="first_name" class="col-sm-3 col-form-label">Nama Depan</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($first_name); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="last_name" class="col-sm-3 col-form-label">Nama Belakang</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($last_name); ?>
                                                      </div>
                                                </div>

                                                <?php

                                                if ($identity_column !== 'email') {
                                                      echo '<p>';
                                                      echo lang('create_user_identity_label', 'identity');
                                                      echo '<br />';
                                                      echo form_error('identity');
                                                      echo form_input($identity);
                                                      echo '</p>';
                                                }
                                                ?>

                                                <div class="form-group row">
                                                      <label for="company" class="col-sm-3 col-form-label">Lembaga</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($company); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="email" class="col-sm-3 col-form-label">Email</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($email); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="phone" class="col-sm-3 col-form-label">No. HP</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($phone); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="password" class="col-sm-3 col-form-label">Password</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($password); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="password_confirm" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($password_confirm); ?>
                                                      </div>
                                                </div>

                                          </div>

                                          <div class="card-footer">
                                                <button type="submit" class="btn btn-success">Tambah Pengguna</button>
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