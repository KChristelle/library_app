<?php
include("path.php");
session_start();

unset($_SESSION['id']);
unset($_SESSION['username']);
unset($_SESSION['access']);
unset($_SESSION['message']);
unset($_SESSION['type']);
session_destroy();

// Redirecting the user to the homepage
header('location: ' . BASE_URL . '/index.php');
