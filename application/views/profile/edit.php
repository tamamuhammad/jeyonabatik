<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pl-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Ganti Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profile</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('profile/changepassword') ?>">Ganti Password</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-sm-10">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Password"></div>
            <?= $this->session->flashdata('danger'); ?>
            <form action="" method="post">
                <div class="form-group">
                    <label for="passwordlama" class="col-sm-2 col-form-label">Password lama</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwordlama" name="passwordlama">
                        <?= form_error('passwordlama', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwordbaru" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="passwordbaru" name="passwordbaru">
                        <?= form_error('passwordbaru', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ulangipassword" class="col-sm-2 col-form-label">Ulangi Password Baru</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="ulangipassword" name="ulangipassword">
                        <?= form_error('ulangipassword', '<small class="text-danger">', '</small') ?>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-warning" type="submit">Ganti password</button>
                </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->