<?php
session_start();  /* Session is a way to store information in variables to be used across pages. */
//print_r($_POST); /* This "print_r" function is used for printing outputs in array form */
require_once('database.php');  /* To get database connection and queries from "database.php" */

/* Setting up the variables to catch form data from user input */
$email = $_POST['user_email'];
$password = md5($_POST['password']);

/* Checking query to match user information in database */
$checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email='$email' AND password='$password'";

/* "$db_connection" is for database connection and "$checking_query" for comparing with database information. */
$from_db = mysqli_query($db_connection, $checking_query);

$after_assoc = mysqli_fetch_assoc($from_db); /* Associative array shows strings as index. */

if ($after_assoc['total_users'] == 1) {
    $_SESSION['email'] = $email;
    $_SESSION['user_status'] = 'yes';
    header('location: admin/dashboard.php');
} else {                                     /* User authentication check */
    $_SESSION['login_error'] = "User information didn't match! Complete registration first.";
    header('location: login.php');
}
