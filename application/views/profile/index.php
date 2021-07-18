<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper pl-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profile</a></li>
                        <li class="breadcrumb-item active"><a href="<?= base_url('profile/edit') ?>">Edit Profile</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-sm-8">
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Profile"></div>
            <?= form_open_multipart('profile'); ?>
            <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?= $user['username']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-thumbnail foto">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                <label class="custom-file-label" for="gambar">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 justify-content-end">
                <button class="btn btn-warning" type="submit">Edit</button>
            </div>
            </form>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->