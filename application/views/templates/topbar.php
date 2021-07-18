<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-olive navbar-dark p-0">
    <!-- Left navbar links -->
    <?php
    $url = explode('/', current_url());
    if (isset($url[5])) {
        $uri = $url[5];
    } else {
        $uri = null;
    }
    $url = $url[4];
    ?>
    <ul class="navbar-nav ml-2 <?= ($url == 'profile' && $uri == null ? '' : 'mt-3') ?> barResponsive">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-flex">
            <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($url == 'dashboard' ? ' active' : 'linknav') ?>">Dashboard</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto <?= ($url == 'profile' ? '' : 'mb-1') ?>">
        <li class="nav-item dropdown">
            <a class="nav-link d-block py-0" role="button" data-toggle="dropdown" id="userDropdown" aria-haspopup="true" aria-expanded="false"><?= $user['nama'] ?>
                <img src="<?= base_url('assets/img/profile/') . $user['gambar'] ?>" class="img-circle elevation-2 ml-2" alt="User Image" width="40">
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item logout"><i class="fas fa-fw fa-sign-out-alt"></i>
                    Logout
                </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->