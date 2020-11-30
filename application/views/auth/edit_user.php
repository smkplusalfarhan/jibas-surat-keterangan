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
                                          <?php echo form_open(uri_string()); ?>

                                          <div class="card-body">
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

                                                <div class="form-group row">
                                                      <label for="company" class="col-sm-3 col-form-label">Lembaga</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($company); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="phone" class="col-sm-3 col-form-label">No. HP</label>
                                                      <div class="col-sm-9">
                                                            <?php echo form_input($phone); ?>
                                                      </div>
                                                </div>

                                                <div class="form-group row">
                                                      <label for="password" class="col-sm-3 col-form-label">Password (jika ingin diubah)</label>
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

                                                <?php if ($this->ion_auth->is_admin()) : ?>

                                                      <div class="form-group row">
                                                            <label for="password_confirm" class="col-sm-3 col-form-label">Hak akses</label>
                                                            <div class="col-sm-9">
                                                                  <?php foreach ($groups as $group) : ?>
                                                                        <label class="checkbox mr-4">
                                                                              <input type="checkbox" class="mr-1" name="groups[]" value="<?php echo $group['id']; ?>" <?php echo (in_array($group, $currentGroups)) ? 'checked="checked"' : null; ?>>
                                                                              <?php echo htmlspecialchars($group['name'], ENT_QUOTES, 'UTF-8'); ?>
                                                                        </label>
                                                                  <?php endforeach ?>
                                                            </div>
                                                      </div>

                                                <?php endif ?>

                                          </div>

                                          <?php echo form_hidden('id', $user->id); ?>
                                          <?php echo form_hidden($csrf); ?>

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