<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?= base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

</head>

<body>
    <nav class="navbar-expand-md navbar-expand-md navbar-expand-lg navbar navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand ml-3" href="<?= base_url('home') ?>">
                <img src="<?= base_url('assets/img/lg1.jpg') ?>" width="50" height="40" alt="" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('home') ?>">Home</a>
                        <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('home/produk') ?>">Produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>