  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header pb-0">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark"><?= $title ?></h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/galeri') ?>">Galeri</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Foto"></div>
      <div class="flashdata" data-flashdata="<?= $this->session->flashdata('gagal'); ?>" data-data="Foto"></div>
      <div class="container mb-4">
          <div class="row">
              <div class="col-12 px-3">
                  <form action="<?= base_url('dashboard/addfoto') ?>" method="post" enctype="multipart/form-data" class="form-inline">
                      <input type="hidden" id="idproduk" name="idproduk" value="<?= $produk['id'] ?>">
                      <div class="form-group mr-auto w-75">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="foto" name="foto">
                              <label class="custom-file-label" for="foto">Pilih foto</label>
                          </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-info">Tambah Foto</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <div class="card-group p-2">
          <?php foreach ($foto as $f) : ?>
              <div class="col-sm-4 card mx-2 p-0">
                  <img src="<?= base_url('assets/img/') . $f['foto'] ?>" class="img-fluid" style="border-radius: 5px; height: 240px; object-fit:cover">
                  <a href="<?= base_url('dashboard/remove/' . $f['id'] . '/' . $f['id_produk']) ?>" class="float-right ml-4 hapus" style="margin-top: -40px; color:white"><i class="fas fa-trash-alt"></i></a>
              </div>
          <?php endforeach; ?>
      </div>
  </div>