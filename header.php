<?php ?>

<nav class="navbar navbar-expand-lg sticky-top">
    <a class="navbar-brand" href="<?php echo BASE_URL . "/index.php"; ?>" class="logo">
        <img src="<?php echo BASE_URL . '/assets/images/book.png'; ?>" style="width:10%; padding-top:.5em; padding-left: 1em;" alt="Logo">
    </a>


    <ul class="navbar-nav ml-auto">
        <?php if (isset($_SESSION['id'])) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user" style="font-size: large; color: white;"></i>
                    <?php echo $_SESSION['username'] ?>
                </a>

                <div class="dropdown-menu" aria-labelledby="user">
                    <a href="<?php echo BASE_URL . '/home.php'; ?>" class="logout dropdown-item">Home</a>
                    <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout dropdown-item">Logout</a>
                </div>
            </li>
        <?php endif; ?>
    </ul>

</nav>