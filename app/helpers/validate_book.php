<?php

function validateBook($book)
{

    $errors = array();

    if (empty($book['title'])) {
        array_push($errors, 'title required');
    }

    if (empty($book['author'])) {
        array_push($errors, 'author name required');
    }

    if (empty($book['description'])) {
        array_push($errors, 'description required');
    }

    if (empty($book['category_id'])) {
        array_push($errors, 'please select a category');
    }


    $existingBook = selectOne('books', ['title' => $book['title']]);
    if ($existingBook) {
        if (isset($book['update-book']) && $existingBook['id'] != $book['id']) {
            array_push($errors, 'Book with that title already exists');
        }

        if (isset($book['add-book'])) {
            array_push($errors, 'Book with that title already exists');
        }
    }

    return $errors;
}
