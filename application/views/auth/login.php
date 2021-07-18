<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('auth') ?>"><b>Login</b> Page</a>
    </div>
    <?= $this->session->flashdata('message'); ?>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="text-muted text-center">Log In untuk halaman web KERJA</p>
            <form action="<?= base_url('auth'); ?>" method="post">
                <div class="input-group mt-3">
                    <input type="text" class="form-control" placeholder="Username" name="nama" id="nama" autofocus value="<?= set_value('nama') ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-at"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mt-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                <div class="row mt-3">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Log In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->