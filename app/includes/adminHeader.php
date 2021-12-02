<?php ?>

<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="<?php echo BASE_URL . "/index.php"; ?>" class="logo">
        <img src="<?php echo BASE_URL . '/assets/images/book.png'; ?>" style="width:10%; padding-top:.5em; padding-left: 1em;" alt="Logo">

    </a>
    <!-- <i id="menu" class="fa fa-bars menu-toggle fa-2x"></i> -->

    <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['id'])) : ?>
            <li class="dropdown">
                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a> -->
                <a id="user" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" style="font-size: large; color: white;"></i>
                    <?php echo $_SESSION['username'] ?>
                    <!-- <i class="fa fa-chevron-down" style="font-size: .8em; color: white;"></i> -->
                </a>

                <ul class="dropdown-menu">
                    <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'; ?>" class="logout">Dashboard</a></li>
                    <li><a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout">Logout</a></li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>

</nav>