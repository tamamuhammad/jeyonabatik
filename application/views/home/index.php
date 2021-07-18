<div class="site-section space-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="height: 500px!important">
                        <div class="carousel-item">
                            <img src="<?= base_url('assets/img/1.jpg') ?>" class="d-block img-fluid" style="max-height:500px; width:1000px; margin: 0px auto;object-fit: cover;">
                        </div>
                        <div class="carousel-item active carousel-item-left">
                            <img src="<?= base_url('assets/img/2.jpg') ?>" class="d-block img-fluid" style="max-height:500px; width:1000px; margin: 0px auto;object-fit: cover;">
                        </div>
                        <div class="carousel-item carousel-item-next carousel-item-left">
                            <img src="<?= base_url('assets/img/3.png') ?>" class="d-block img-fluid" style="max-height:500px; width:1000px; margin: 0px auto;object-fit: cover;">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row pt-4 mx-2">
            <div class="col-md-12 mb-3">
                <font style="font-weight: bold;color:#315c6c !important">BEST SELLER PRODUCT</font>
                <a href="<?= base_url('home/produk') ?>" style="float: right; color: #315c6c;">See All Product</a>
            </div>

            <?php foreach ($produk as $p) : ?>
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
                                <font href="#"><?= $p['nama'] ?></font>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="site-section pemesanan-produk" style="margin-top: 3rem!important;">
    <div class="container">
        <div class="row pt-5">
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

<section class="text-center my-5 p-1">
    <div class="container">
        <!-- Section heading -->
        <h2 class="h1-responsive font-weight-bold my-5">Testimonials</h2>

        <!-- Grid row -->
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-lg-0 mb-4">
                <!--Card-->
                <div class="card testimonial-card">
                    <!--Background color-->
                    <div class="card-up info-color"></div>
                    <!--Avatar-->
                    <div class="avatar mx-auto white">
                        <img src="<?= base_url('assets/img/') ?>pf.png" width="50%" class="rounded-circle img-fluid mt-3">
                    </div>
                    <div class="card-body">
                        <!--Name-->
                        <h4 class="font-weight-bold mb-4">John Doe</h4>
                        <hr>
                        <!--Quotation-->
                        <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"></i>Lorem ipsum dolor sit
                            amet eos
                            adipisci, consectetur adipisicing elit.</p>
                    </div>
                </div>
                <!--Card-->
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-md-0 mb-4">
                <!--Card-->
                <div class="card testimonial-card">
                    <!--Background color-->
                    <div class="card-up blue-gradient">
                    </div>
                    <!--Avatar-->
                    <div class="avatar mx-auto white">
                        <img src="<?= base_url('assets/img/') ?>pf.png" width="50%" height="50%" class="rounded-circle img-fluid mt-3">
                    </div>
                    <div class="card-body">
                        <!--Name-->
                        <h4 class="font-weight-bold mb-4">Anna Aston</h4>
                        <hr>
                        <!--Quotation-->
                        <p class="dark-grey-text mt-4"><i class="fas fa-quote-left pr-2"></i>Neque cupiditate
                            assumenda in
                            maiores repudiandae mollitia architecto.</p>
                    </div>
                </div>
                <!--Card-->
            </div>
            <!--Grid column-->

        </div>
        <!-- Grid row -->
    </div>
</section>
<!-- Section: Testimonials -->

<!-- Testi -->