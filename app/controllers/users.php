<?php

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/helpers/validate_user.php");

$table = 'users';
$access_users = selectAll($table, ['access' => 1]);
$errors = array();
$id = '';
$username = '';
$email = '';
$access = '';
$password = '';
$conf_password = '';
$role = '';




function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['access'] = $user['access'];
    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    if ($_SESSION['access']) {
        header('location: ' . BASE_URL . '/admin/dashboard.php');
        // header('location: ' . BASE_URL . '/admin/posts/index.php');
    } else {
        header('location: ' . BASE_URL . '/index.php');
    }


    exit();
}

// Create a user
if (isset($_POST['register-btn']) || isset($_POST['create-access'])) {
    $errors = validateUser($_POST);
    if (count($errors) == 0) {
        unset($_POST['register-btn'], $_POST['conf_password'], $_POST['create-access']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (isset($_POST['access'])) {
            $_POST['access'] = 1;
            $__POST['role'] = "librarian";
            $user_id = create($table, $_POST);
            
            $_SESSION['message'] = "Admin user created successfully";
            $_SESSION['type'] = "success";
            header('location: ' . BASE_URL . '/admin/users/index.php');
            exit();
        } else {
            $_POST['access'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            //log user in
            // The information to be stored in the session
            loginUser($user);
        }
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $access = isset($_POST['access']) ? 1 : 0;
        $password = $_POST['password'];
        $conf_password = $_POST['conf_password'];
    }
}


if (isset($_POST['login-btn'])) {
    $errors = validateLogin($_POST);

    if (count($errors) == 0) {
        $user = selectOne($table, ['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            //log user in
            // The information to be stored in the session
            loginUser($user);
        } else {
            array_push($errors, "Wrong credentials");
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
    }
}

// Delting an admin user
if (isset($_GET['delete_id'])) {
    $count = delete($table, $_GET['delete_id']);
    $_SESSION['message'] = "Admin user deleted";
    $_SESSION['type'] = "success";
    header('location: ' . BASE_URL . '/admin/users/index.php');
    exit();
}

// Update a user
if (isset($_POST['update-user'])) {
    $errors = validateUser($_POST);
    if (count($errors) == 0) {
        $id = $_POST['id'];
        unset($_POST['conf_password'], $_POST['update-user'], $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);


        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $count = update($table, $id, $_POST);
        $_SESSION['message'] = "Admin user created successfully";
        $_SESSION['type'] = "success";
        header('location: ' . BASE_URL . '/admin/users/index.php');
        exit();
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $access = isset($_POST['admin']) ? 1 : 0;
        $password = $_POST['password'];
        $conf_password = $_POST['conf_password'];
    }
}


// Edit admin user
if (isset($_GET['id'])) {
    $user = selectOne($table, ['id' => $_GET['id']]);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $access = isset($user['admin']) ? 1 : 0;
}
