  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header pb-0">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">Dashboard</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-lg-3 col-6 mt-5">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3 style="font-size: 36pt"><?= $produk; ?></h3>

                          <p class="mt-1 mb-0">Jumlah Produk</p>
                      </div>
                      <div class="icon">
                          <i style="padding-left: 20px; font-size: 75px" class="circle elevation-2 fad fa-bags-shopping"></i>
                      </div>
                      <input class="small-box-footer btn w-100" type="submit" name="semua" value="More info">
                  </div>
              </div>
              <div class="col-lg-3 col-6 mt-5">
                  <!-- small box -->
                  <div class="small-box bg-primary">
                      <div class="inner">
                          <h3 style="font-size: 36pt"><?= $kategori; ?></h3>

                          <p class="mt-1 mb-0">Jumlah Kategori</p>
                      </div>
                      <div class="icon">
                          <i style="padding-left: 20px; font-size: 75px" class="circle elevation-2 fad fa-tags"></i>
                      </div>
                      <input class="small-box-footer btn w-100" type="submit" name="semua" value="More info">
                  </div>
              </div>
          </div>
      </section>
  </div>