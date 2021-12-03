<?php

function validateUser($user)
{
    $uppercase = preg_match('@[A-Z]@', $user['password']);
    $lowercase = preg_match('@[a-z]@', $user['password']);
    $number    = preg_match('@[0-9]@', $user['password']);
    $specialChar = preg_match('@[^\w]@', $user['password']);
    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'username required');
    }

    if (empty($user['email'])) {
        array_push($errors, 'email required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'password required');
    }

    if (empty($user['conf_password'])) {
        array_push($errors, 'password confirmation required');
    }

    if ($user['conf_password'] != $user['password']) {
        array_push($errors, 'passwords don\'t match');
    }

    // Password strength check
    if (!$uppercase || !$lowercase || !$number || !$specialChar || strlen($user['password']) < 8) {
        array_push($errors, 'Please enter a password with at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
    }


    $existingUser = selectOne('users', ['email' => $user['email']]);
    if ($existingUser) {
        if (isset($user['update-user']) && $existingUser['id'] != $user['id']) {
            array_push($errors, 'Email already exists');
        }

        if (isset($user['create-admin'])) {
            array_push($errors, 'Email already exists');
        }
    }

    return $errors;
}

function validateLogin($user)
{

    $errors = array();

    if (empty($user['username'])) {
        array_push($errors, 'username required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'password required');
    }


    return $errors;
}
