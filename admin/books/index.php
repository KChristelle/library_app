<?php
include("../../path.php");
include(ROOT_PATH . "/app/controllers/books.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library| Manage Books</title>

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
                <div class="row">
                    <div class="button-group col-md-4">
                        <a href="create.php" class="btn btn-outline-info">Add a Book</a>
                        <a href="index.php" class="btn btn-outline-info">Manage Books</a>
                    </div>

                    <div class="input-group rounded col-md-4 ml-auto">
                        <form action="" method="get">
                            <div class="input-group">
                                <input name="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <button name="search-btn" class="btn btn-outline-info border-0" id="search-addon" style="margin-left:5px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>


                </div>

                <div class="content">
                    <h2 class="page-title">Manage Books</h2>

                    <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
                    <table>
                        <thead>
                            <th></th>
                            <th>Title</th>
                            <th>Author</th>
                            <th colspan="3" style="text-align: center;">Action</th>
                            <th>Date</th>
                        </thead>
                        <tbody>

                            <?php foreach ($books as $key => $book) : ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $book['title']; ?></td>
                                    <td><?php echo $book['author']; ?></td>
                                    <td><a href="edit.php?id=<?php echo $book['id']; ?>" id="edit">Edit</a></td>
                                    <td><a href="index.php?delete_id=<?php echo $book['id']; ?>" id="delete">Delete</a></td>

                                    <?php if ($book['availability']) : ?>
                                        <td><a href="index.php?availability=0&b_id=<?php echo $book['id']; ?>" id="unavailale">Lend</a></td>
                                    <?php else : ?>
                                        <td><a href="index.php?availability=1&b_id=<?php echo $book['id']; ?>" id="available">Return</a></td>
                                    <?php endif; ?>

                                    <td><?php echo $book['calendar']; ?></td>
                                </tr>
                            <?php endforeach; ?>



                        </tbody>
                    </table>
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