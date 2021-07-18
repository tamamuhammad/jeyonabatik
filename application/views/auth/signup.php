<div class="register-box my-5">
    <div class="register-logo">
        <a href="<?= base_url('auth/signup') ?>">Register <b>Admin</b></a>
    </div>

    <div class="card mt-5">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register Account Admin Baru</p>

            <form action="<?= base_url('auth/signup'); ?>" method="post">
                <div class="input-group py-2">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" autofocus value="<?= set_value('nama') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group py-2">
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="<?= set_value('username') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-at"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group py-2">
                    <input type="password" class="form-control" placeholder="Password" id="password1" name="password1">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group py-2">
                    <input type="password" class="form-control" placeholder="Ulangi password" id="password2" name="password2">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                <div class="row mt-3">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Buat Akun</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->