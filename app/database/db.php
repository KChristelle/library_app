<?php

session_start();
require('config.php');

function displayData($value)
{
    echo "<pre>", print_r($value, true), "<pre>";
}


function executeQuery($sql, $data)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $values = array_values($data);
    $types = str_repeat('s', count($values));
    $stmt->bind_param($types, ...$values);
    $stmt->execute();
    return $stmt;
}

function selectAll($table, $conditions = [])
{
    global $conn;
    $sql = "SELECT * FROM $table";
    if (empty($conditions)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    } else {
        // return records that match conditions

        $index = 0;
        foreach ($conditions as $key => $value) {
            if ($index == 0) {
                $sql = $sql . " WHERE $key = ?";
            } else {
                $sql = $sql . " AND $key = ?";
            }
            $index++;
        }
        $stmt = executeQuery($sql, $conditions);
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}

function selectOne($table, $conditions)
{
    global $conn;
    $sql = "SELECT * FROM $table";
    // return records that match conditions

    $index = 0;
    foreach ($conditions as $key => $value) {
        if ($index == 0) {
            $sql = $sql . " WHERE $key = ?";
        } else {
            $sql = $sql . " AND $key = ?";
        }
        $index++;
    }

    // Promotes efficiency by preventing searching
    // through all records in the database
    $sql = $sql . " LIMIT 1";

    $stmt = executeQuery($sql, $conditions);
    return $stmt->get_result()->fetch_assoc();
}


// Create
function create($table, $data)
{
    global $conn;

    $sql = "INSERT INTO $table SET";

    $index = 0;
    foreach ($data as $key => $value) {
        if ($index == 0) {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $index++;
    }

    $stmt = executeQuery($sql, $data);
    return $stmt->insert_id;
}

// Search 
function searchBooks($table, $data){
    global $conn;
    $sql = "SELECT * FROM $table WHERE title LIKE '%".$data."%' OR author LIKE '%".$data."%';";
    $stmt = executeQuery($sql, $data);
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

// Update
function update($table, $id, $data)
{
    global $conn;

    $sql = "UPDATE $table SET";

    $index = 0;
    foreach ($data as $key => $value) {
        if ($index == 0) {
            $sql = $sql . " $key = ?";
        } else {
            $sql = $sql . ", $key = ?";
        }
        $index++;
    }

    $sql = $sql . " WHERE id = ?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, $data);
    return $stmt->affected_rows;
}

// Delete
function delete($table, $id)
{
    global $conn;
    $sql = "DELETE FROM $table WHERE id = ?";
    $data['id'] = $id;
    $stmt = executeQuery($sql, ['id' => $id]);
    return $stmt->affected_rows;
}


function getPublishedPosts()
{
    global $conn;
    $sql = "SELECT p.*, u.username FROM posts as p JOIN users AS u ON p.user_id = u.id WHERE p.published=?";
    $stmt = executeQuery($sql, ['published' => 1]);
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

function getBooks()
{
    global $conn;
    $sql = "SELECT b.*, u.username FROM books as b JOIN users AS u ON b.user_id = u.id WHERE u.access=?";
    $stmt = executeQuery($sql, ['access' => 1]);
    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}

