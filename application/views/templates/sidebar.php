<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link py-3 text-center d-inline-flex bg-lightblue w-100" style="padding-left: 12px">
        <img src="<?= base_url('assets/img/SA.png') ?>" width="50px" height="50px">
        <p class="pl-3 text-bold" style="padding-top: 12px">PONPES SMKSA</p>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php
                $submenu = $this->db->get('user_submenu')->result_array();
                foreach ($submenu as $sm) :
                    if ($title == $sm['title']) : ?>
                        <li class="nav-item has-treeview" style="background-color: darkslategrey; border-radius: 5px; height: 43px">
                        <?php else : ?>
                        <li class="nav-item has-treeview">
                        <?php endif; ?>
                        <a href="<?= base_url() . $sm['url'] ?>" class="nav-link">
                            <i class="nav-icon <?= $sm['icon'] ?> fa-fw"></i>
                            <p>
                                <?= $sm['title'] ?>
                            </p>
                        </a>
                        <?php
                        if ($sm['title'] == 'Profile') :
                            if ($title == 'Edit Profile' || $title == 'Ganti Password') {
                        ?>
                                <ul class="nav nav-treeview" style="display: block;">
                                <?php } else { ?>
                                    <ul class="nav nav-treeview" style="display: none;">
                                    <?php } ?>
                                    <?php
                                    $profile = $this->db->get('profile')->result_array();
                                    foreach ($profile as $p) :
                                        if ($title == $p['title']) :
                                    ?>
                                            <li class="nav-item ml-2" style="background-color: darkslategrey; border-radius: 5px; height: 43px">
                                            <?php else : ?>
                                            <li class="nav-item ml-2">
                                            <?php endif; ?>
                                            <a href="<?= base_url() . $p['url'] ?>" class="nav-link">
                                                <i class="nav-icon <?= $p['icon'] ?>"></i>
                                                <p><?= $p['title'] ?></p>
                                            </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('auth/logout'); ?>" class="nav-link logout">
                            <i class="nav-icon fad fa-sign-out-alt fa-fw"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>