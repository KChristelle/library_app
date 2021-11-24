<?php

function validateBook($book)
{

    $errors = array();

    if (empty($book['title'])) {
        array_push($errors, 'title required');
    }

    if (empty($book['body'])) {
        array_push($errors, 'body required');
    }

    if (empty($book['topic_id'])) {
        array_push($errors, 'please select a topic');
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
