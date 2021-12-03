<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validate_book.php");

$categories = selectAll('categories');
$table = 'books';
$books = getBooks();
$errors = array();

$id = "";
$title = "";
$author = "";
$description = "";
$category_id = "";
$availability = "";

if (isset($_GET['id'])) {
    $book = selectOne($table, ['id' => $_GET['id']]);
    $id = $book['id'];
    $title = $book['title'];
    $description = $book['description'];
    $category_id = $book['category_id'];
    $availability = $book['availability'];
}

// Delete a book
if (isset($_GET['delete_id'])) {
    $count = delete($table, $_GET['delete_id']);

    $_SESSION['message'] = "Book deleted successfully";
    $_SESSION['type'] = "success";

    header("location: " . BASE_URL . "/admin/books/index.php");
    exit();
}

// Lending and Returning a book
if (isset($_GET['availability']) && isset($_GET['b_id'])) {
    $availability = $_GET['availability'];
    $b_id = $_GET['b_id'];

    // Update availability field
    $count = update($table, $b_id, ['availability' => $availability]);

    $_SESSION['message'] = "Book availability state changed";
    $_SESSION['type'] = "success";

    header("location: " . BASE_URL . "/admin/books/index.php");
    exit();
}

// Create a book
if (isset($_POST['add-book'])) {
    $errors = validateBook($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-book']);
        $_POST['user_id'] = 1;
        $_POST['availability'] = isset($_POST['availability']) ? 1 : 0;
        $_POST['description'] = htmlentities($_POST['description']);
        $book_id = create($table, $_POST);

        $_SESSION['message'] = "Book created successfully";
        $_SESSION['type'] = "success";

        header("location: " . BASE_URL . "/admin/books/index.php");
        exit();
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $author = $_POST['author'];
        $category_id = $_POST['category_id'];
        $availability = isset($_POST['availability']) ? 1 : 0;
    }
}

// Search for a book

// Update a Post
if (isset($_POST['update-book'])) {
    $errors = validateBook($_POST);

    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['update-book'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['availability'] = isset($_POST['availability']) ? 1 : 0;
        $_POST['description'] = htmlentities($_POST['description']);

        $post_id = update($table, $id, $_POST);

        $_SESSION['message'] = "Book updated successfully";
        $_SESSION['type'] = "success";

        header("location: " . BASE_URL . "/admin/books/index.php");
        exit();
    } else {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category_id = $_POST['category_id'];
        $availability = isset($_POST['availability']) ? 1 : 0;
    }
}
