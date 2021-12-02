<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validate_book.php");

$categories = selectAll('categories');
$table = 'books';
// $books = getBooks();
$errors = array();

$id = "";
$title = "";
$author = "";
$description = "";
$category_id = "";
$availability = "";

// if (isset($_GET['id'])) {
//     $book = selectOne($table, ['id' => $_GET['id']]);
//     $id = $book['id'];
//     $title = $book['title'];
//     $description = $book['description'];
//     $category_id = $book['category_id'];
//     $availability = $book['availability'];
// }

// Delete a book
// if (isset($_GET['delete_id'])) {
//     $count = delete($table, $_GET['delete_id']);

//     $_SESSION['message'] = "Book deleted successfully";
//     $_SESSION['type'] = "success";

//     header("location: " . BASE_URL . "/admin/books/index.php");
//     exit();
// }

// if (isset($_GET['published']) && isset($_GET['p_id'])) {
//     $published = $_GET['published'];
//     $p_id = $_GET['p_id'];

//     // Update published field
//     $count = update($table, $p_id, ['published' => $published]);

//     $_SESSION['message'] = "Book publish state changed";
//     $_SESSION['type'] = "success";

//     header("location: " . BASE_URL . "/admin/books/index.php");
//     exit();
// }

// Create a book
if (isset($_POST['add-book'])) {
    $errors = validateBook($_POST);

    if (count($errors) == 0) {
        unset($_POST['add-book']);
        $_POST['user_id'] = 0;
        $_POST['availability'] = isset($_POST['availability']) ? 1 : 0;
        $_POST['description'] = htmlentities($_POST['description']);
        $post_id = create($table, $_POST);

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


// Update a Post
// if (isset($_POST['update-book'])) {
//     $errors = validateBook($_POST);

//     if (count($errors) == 0) {
//         $id = $_POST['id'];
//         unset($_POST['update-book'], $_POST['id']);
//         $_POST['user_id'] = $_SESSION['id'];
//         $_POST['published'] = isset($_POST['published']) ? 1 : 0;
//         $_POST['body'] = htmlentities($_POST['body']);

//         $post_id = update($table, $id, $_POST);

//         $_SESSION['message'] = "Post updated successfully";
//         $_SESSION['type'] = "success";

//         header("location: " . BASE_URL . "/admin/books/index.php");
//         exit();
//     } else {
//         $title = $_POST['title'];
//         $body = $_POST['body'];
//         $topic_id = $_POST['topic_id'];
//         $published = isset($_POST['published']) ? 1 : 0;
//     }
// }
