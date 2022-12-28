<?php
session_start();
require_once('../database.php');                /* Importing database page */
//$login_email = $_SESSION['email'];            /* Importing SESSION email from login_post page */
//print_r($_POST);

if ($_POST['user_name'] == NULL || $_POST['phone'] == NULL) {  /* Condition for checking null values */
    $_SESSION['profile_error'] = "Fields cannot be empty!";    /* Setting up error message in SESSION */
    header('location: profile_edit.php');                      /* Destination for showing error message */
} else {
    $user_name = $_POST['user_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $update_query = "UPDATE users SET user_name='$user_name', phone='$phone' WHERE email='$email'";
    mysqli_query($db_connection, $update_query);
    header('location: profile.php');
}
