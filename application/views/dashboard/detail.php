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
                          <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/galeri') ?>">Galeri</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="container">
          <?php
            $jumlahfoto = count($foto);
            if ($jumlahfoto > 1) {
            ?>
              <div id="kontrol" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" style="height: 480px!important">
                      <?php
                        foreach ($foto as $key => $value) {
                            $active = ($key == 0) ? 'active' : '';
                            echo '<div class="carousel-item ' . $active . '">
                                            <img src="' . base_url('assets/img/') . $value['foto'] . '" class="d-block img-fluid rounded-lg" style="width: 100%; height: 480px; object-fit: cover">
                                        </div>';
                        }
                        ?>
                  </div>
                  <a class="carousel-control-prev" href="#kontrol" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#kontrol" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
              </div>
              <?php } else {
                foreach ($foto as $f) :
                ?>
                  <img src="<?= base_url('assets/img/') . $f['foto'] ?>" class="d-block img-fluid rounded-lg" style="width: 100%">
          <?php endforeach;
            } ?>
          <div class="row">
              <div class="col-4">
                  <p>Nama</p>
                  <p>Deskripsi</p>
                  <p>Ukuran</p>
                  <p>Harga</p>
                  <p>Kategori</p>
                  <p>Popularitas</p>
              </div>
              <div class="col-8">
                  <p><?= $produk['nama'] ?></p>
                  <p><?= $produk['deskripsi'] ?></p>
                  <p><?= $produk['ukuran'] ?></p>
                  <p><?= $produk['harga'] ?></p>
                  <?php $kat = $this->db->get_where('kategori', ['id' => $produk['id_kategori']])->row_array() ?>
                  <p><?= $kat['kategori'] ?></p>
                  <p><?= $produk['popularitas'] ?></p>
              </div>
          </div>
      </div>
  </div>