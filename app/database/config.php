<?php

// Database credentials
// TODO: Check root password

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'debian-sys-maint');
define('DB_PASSWORD', '5jgYsof0ocJmW0re');
// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'debian-sys-maint');
// define('DB_PASSWORD', '6APkPQHobtK9ydtw');
define('DB_DATABASE', 'library');

// Connect to MYSQL database
// $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
$conn = mysqli_connect('localhost', 'debian-sys-maint', '5jgYsof0ocJmW0re', 'library');

// Check connection
if($conn === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
?>