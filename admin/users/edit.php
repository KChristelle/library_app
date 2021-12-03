<?php
include("../../path.php");
include(ROOT_PATH . "/app/controllers/users.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library| Edit Admin user</title>

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Work Sans Link -->
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../assets/css/admin.css">
</head>

<body>
    <?php if (isset($_SESSION['id'])) : ?>

    <!-- Admin Header -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php") ?>


    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">

        <!-- Left side bar -->
        <?php include(ROOT_PATH . "/app/includes/adminSideBar.php") ?>

        <!--  Admin Content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn btn-outline-info">Add a User</a>
                <a href="index.php" class="btn btn-outline-info">Manage Users</a>
            </div>

            <div class="content">
                <h2 class="page-title">Edit Admin User</h2>
                <?php include(ROOT_PATH . "/app/helpers/form_errors.php"); ?>
                <form action="edit.php" method="POST">
                    <input required type="hidden" class="form-control" name="id" id="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input required type="text" class="form-control" name="username" id="username" value="<?php echo $username; ?>">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>">
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="role" class="form-control" name="role" value="<?php echo $role; ?>" id="role">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                    </div>

                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <input type="password" name="conf_password" class="form-control" value="<?php echo $conf_password; ?>">
                    </div>

                    <div class="form-check">
                        <?php if ((isset($admin)) && $admin == 1) : ?>
                            <input type="checkbox" checked class="form-check-input" name="admin" id="admin">
                            <label for="admin" class="form-check-label">
                                Administrator
                            </label>
                        <?php else : ?>
                            <input type="checkbox" class="form-check-input" name="admin" id="admin">
                            <label for="admin" class="form-check-label">
                                Administrator
                            </label>
                        <?php endif; ?>
                    </div>

                    <div class="button-submit">
                        <button type="submit" name="update-user" class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <?php else : ?>
        <div class="admin-wrapper">
            <div class="content">
                <h1 class="page-title" id="dash-title">Hey, there! You are not logged in.</h1>

                <p style="text-align: center;"><a href="<?php echo BASE_URL . '/register.php' ?>">Sign up</p>

            </div>
        </div>
    <?php endif; ?>
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- JavaScript -->
    <script src="../../assets/js/scripts.js"></script>
</body>

</html>