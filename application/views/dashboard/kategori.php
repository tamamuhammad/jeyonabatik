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
                          <li class="breadcrumb-item active"><a href="<?= base_url('dashboard/galeri') ?>">Kategori</a></li>
                      </ol>
                  </div><!-- /.col -->
              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>" data-data="Kategori"></div>
      <a href="" class="btn btn-info tC" data-toggle="modal" data-target="#addCategory">Tambah Kategori</a>
      <table class="table table-hover">
          <thead>
              <th scope="col">#</th>
              <th scope="col">Nama Kategori</th>
              <th scope="col">Opsi</th>
          </thead>
          <tbody>
              <?php
                $i = 1;
                foreach ($kategori as $r) :
                ?>
                  <tr>
                      <th><?= $i++; ?></th>
                      <td><?= $r['kategori'] ?></td>
                      <td>
                          <a href="" class="badge badge-success eC" data-toggle="modal" data-target="#addCategory" data-id="<?= $r['id'] ?>">edit</a>
                          <a href="<?= base_url('dashboard/delete/') . $r['id'] ?>" class="badge badge-danger hapus">delete</a>
                      </td>
                  </tr>
              <?php endforeach; ?>
          </tbody>
      </table>
  </div>

  <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addNewCategory" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="addNewCategory">Tambah Kategori</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url('dashboard/kategori') ?>" method="post">
                      <input type="hidden" name="id" id="id" value="">
                      <div class="form-group">
                          <label for="kat">Kategori :</label>
                          <input type="text" class="form-control" name="kat" id="kat">
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-info">Tambah Kategori</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>