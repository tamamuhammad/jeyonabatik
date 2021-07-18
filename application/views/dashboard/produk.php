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
                          <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                          <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/produk') ?>">Produk</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Produk"></div>
      <button type="button" data-toggle="modal" data-target="#addProduk" class="btn btn-info tambah ml-2 mb-2">Tambah Produk</button>
      <div class="card mx-2">
          <div class="card-body table-responsive p-2 d-inline-flex">
              <table id="tabel-data" class="table table-striped table-hover text-nowrap dataTable" style="border-left: 2px solid #17a2b8">
                  <thead>
                      <tr>
                          <td>No.</td>
                          <td>Nama Produk</td>
                          <td>Deskripsi</td>
                          <td>Ukuran</td>
                          <td>Harga</td>
                          <td>Kategori</td>
                          <td>Popularitas</td>
                          <td>Opsi</td>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        $i = 1;
                        foreach ($produk as $a) :
                        ?>
                          <tr>
                              <td><?= $i++; ?></td>
                              <td><?= $a['nama'] ?></td>
                              <td><?= substr($a['deskripsi'], 0, 50) ?></td>
                              <td><?= $a['ukuran'] ?></td>
                              <td><?= $a['harga'] ?></td>
                              <?php $kategori = $this->db->get_where('kategori', ['id' => $a['id_kategori']])->row_array() ?>
                              <td><?= $kategori['kategori'] ?></td>
                              <td><?= $a['popularitas'] ?></td>
                              <td>
                                  <a href="<?= base_url('dashboard/detail/') . $a['id'] ?>">detail</a>
                                  <a href="" data-toggle="modal" data-target="#addProduk" class="edit" data-id="<?= $a['id'] ?>">edit</a>
                                  <a href="<?= base_url('dashboard/hapus/') . $a['id'] ?>" class="hapus">hapus</a>
                                  <a href="<?= base_url('dashboard/foto/') . $a['id'] ?>">foto</a>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addProduk" tabindex="-1" role="dialog" aria-labelledby="addNewProduk" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addNewProduk">Tambah Produk</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('dashboard/produk') ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="id" id="id" value="">
                      <div class="form-group">
                          <label for="nama">Nama :</label>
                          <input type="text" class="form-control" name="nama" id="nama">
                      </div>
                      <div class="form-group">
                          <label for="kategori">Kategori :</label>
                          <select name="kategori" id="kategori" class="form-control">
                              <?php foreach ($kat as $m) : ?>
                                  <option value="<?= $m['id'] ?>"><?= $m['kategori'] ?></option>
                              <?php endforeach; ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="ukuran">Ukuran :</label>
                          <input type="text" class="form-control" name="ukuran" id="ukuran">
                      </div>
                      <div class="form-group">
                          <label for="harga">Harga :</label>
                          <input type="text" class="form-control" name="harga" id="harga">
                      </div>
                      <div class="form-group">
                          <label for="deskripsi">Deskripsi :</label>
                          <textarea name="deskripsi" id="deskripsi" cols="20" rows="5" class="form-control"></textarea>
                      </div>
                      <script>
                          if (!id) {
                      </script>
                      <div class="form-group">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="foto" name="foto">
                              <label class="custom-file-label" for="foto">Pilih foto</label>
                          </div>
                      </div>
                      <script>
                          }
                      </script>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-info">Add Menu</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>