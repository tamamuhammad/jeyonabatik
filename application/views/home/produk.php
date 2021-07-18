<div class="site-section space-header my-4">
    <div class="container-fluid">
        <div class="row pt-4">
            <?php
            foreach ($kategori as $k) :
                if ($k['id'] == 3) {
            ?>
                    <div class="site-section pemesanan-produk">
                        <div class="section-header text-center">
                            <h2 class="text-center pt-4">CARA PEMESANAN</h2>
                        </div>
                        <div class="container">
                            <div class="row pt-4">
                                <div class="col-lg-3 col-md-3 text-center ">
                                    <i class="fas fa-3x fa-truck" style="color: #cdeb06;"></i>
                                    <p class="pt-2" style="font-weight: bold;color: aliceblue;">FREE DELIVERY</p>
                                </div>
                                <div class="col-lg-3 col-md-3 text-center ">
                                    <i class="fas fa-3x fa-check-circle" style="color: #cdeb06;"></i>
                                    <p class="pt-2" style="font-weight: bold;color: aliceblue;">BEST QUALITY</p>
                                </div>
                                <div class="col-lg-3 col-md-3 text-center ">
                                    <i class="fas fa-3x fa-box-open" style="color: #cdeb06;"></i>
                                    <p class="pt-2" style="font-weight: bold;color: aliceblue;">GUARANTEE</p>
                                </div>
                                <div class="col-lg-3 col-md-3 text-center pb-4">
                                    <i class="fas fa-3x  fa-hand-holding-usd" style="color: #cdeb06;"></i>
                                    <p class="pt-2" style="font-weight: bold;color: aliceblue;">BEST PRICE</p>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>
                <div class="col-md-12 mb-3">
                    <font style="font-weight: bold;color:#315c6c !important"><?= $k['kategori'] ?></font>
                </div>
                <?php
                $produk = $this->db->get_where('produk', ['id_kategori' => $k['id']])->result_array();
                foreach ($produk as $p) :
                ?>
                    <div class="col-md-3">
                        <div class="simple">
                            <a href="<?= base_url('home/detail/') . $p['id'] ?>" class="produk" data-id="<?= $p['id'] ?>">
                                <div class="simple_img">
                                    <?php
                                    $foto = $this->db->get_where('foto', ['id_produk' => $p['id']])->result_array();
                                    ?>
                                    <img src="<?= base_url('assets/img/') . $foto[0]['foto'] ?>" class="img-fluid" style="width: 100%;height: 160px;object-fit: cover;">
                                </div>
                                <div class="simple_info text-center pt-2 pb-2">
                                    <font style="color: #315c6c !important;font-weight:bold" href="#"><?= $p['nama'] ?></font>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
    </div>

    <section>

    </section>