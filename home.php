<?php
include("path.php");
include(ROOT_PATH . "/app/controllers/books.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Library | Home</title>

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

  <!-- Work Sans Link -->
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">

  <!-- <link rel="stylesheet" href="../assets/css/styles.css"> -->
  <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

  <?php if (isset($_SESSION['id'])) : ?>
    <!-- Admin Header -->
    <?php include(ROOT_PATH . "/app/includes/adminHeader.php") ?>

    <!-- Admin Page Wrapper -->
    <div class="admin-wrapper">



      <div class="content">
        <h2 class="page-title" id="dash-title">HomePage</h2>
        <?php if (isset($_SESSION['id'])) : ?>
          <h4>
            <Center> Hello, <?php echo $_SESSION['username'] ?></Center><br>
          </h4>
        <?php endif; ?>

        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>

        <table>
          <thead>
            <th></th>
            <th>Book Title</th>
            <th>Author</th>
            <th colspan="3">Status</th>
          </thead>
          <tbody>
            <?php foreach ($books as $key => $book) : ?>
              <tr>
                <td><?php echo $key + 1; ?></td>
                <td><?php echo $book['title']; ?></td>
                <td><?php echo $book['author']; ?></td>

                <?php if ($book['availability']) : ?>
                  <td>
                    <p id="unavailale">Borrowed</a>
                  </td>
                <?php else : ?>
                  <td>
                    <p id="available">Available</a>
                  </td>
                <?php endif; ?>


              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>



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
  <script src="../assets/js/scripts.js"></script>
</body>

</html>