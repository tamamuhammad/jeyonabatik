<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-md-6">
            <?php
            $jumlahfoto = count($foto);
            if ($jumlahfoto > 1) {
            ?>
                <div id="kontrol" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="height: 360px!important">
                        <?php
                        foreach ($foto as $key => $value) {
                            $active = ($key == 0) ? 'active' : '';
                            echo '<div class="carousel-item ' . $active . '">
                                            <img src="' . base_url('assets/img/') . $value['foto'] . '" class="d-block img-fluid rounded-lg" style="width: 100%; height: 360px;object-fit: cover;">
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

            <div style="padding-top: 10px">
                <div class="col-md-9 col-sm-8 col-10 title-product">
                    <h1 style="font-size:16px"><?= $produk['nama'] ?></h1>
                </div>
                <div class="col-md-3 col-sm-4 col-2">
                    <font style="float: right;font-size:13px"><?= $kategori['kategori'] ?></font>
                </div>
            </div>
            <font style="color:#072D65;font-size:25px;font-weight:bold">Rp. <?= $produk['harga'] ?></font>

            <div style="padding-top: 27px">
                <input type="hidden" name="csrf_secure" value="671325d74cf4265fc4993f8c7304355c" id="csrfHash">
                <button class="btn btn-success btn-block btn-lg">PESAN SEKARANG</button>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card mb-4" style="border-radius: 20px;font-size: large;">
                <div class="card-body" style="box-shadow: 0px 3px 10px #00000029; border-radius: 20px;">
                    <b>Detail Product</b>
                    <p class="pt-3"><?= $produk['nama'] ?></p>
                    <hr>
                    <b>Ukuran Produk :</b>
                    <p class="pt-3"><?= $produk['ukuran'] ?></p>
                    <b>Deskripsi Produk :</b>
                    <p class="pt-3"><?= $produk['deskripsi'] ?></p>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>