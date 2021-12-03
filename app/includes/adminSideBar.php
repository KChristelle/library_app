<?php ?>
<div class="left-sidebar">
    <ul>
        <?php if ($_SESSION['role'] == 'admin') : ?>
            <li><a href="<?php echo BASE_URL . "/admin/books/index.php" ?>">Manage Books</a></li>
            <li><a href="<?php echo BASE_URL . "/admin/users/index.php" ?>">Manage Users</a></li>
        <?php else : ?>
            <li><a href="<?php echo BASE_URL . "/admin/books/index.php" ?>">Manage Books</a></li>
        <?php endif; ?>
    </ul>
</div>