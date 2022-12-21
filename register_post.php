<?php
session_start();
require_once('database.php'); /* To get database connection and queries from database.php */
// print_r($_POST);   /* This print_r function is used for checking if the data is coming or not */


// Information from form
$user_name = filter_var($_POST['user_name'], FILTER_SANITIZE_STRING);
$user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
$phone = $_POST['phone'];
$password = $_POST['password'];

$validated_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);

/* Password Rules */
$pass_cap = preg_match('@[A-Z]@', $password);
$pass_small = preg_match('@[a-z]@', $password);
$pass_num = preg_match('@[0-9]@', $password);
$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
$pass_char = preg_match($pattern, $password);

if ($validated_email) {
    if (strlen($password) >= 8 && $pass_cap == 1 && $pass_small == 1 && $pass_num == 1 && $pass_char == 1) {
        // Password Encryption
        $encrypt_password = md5($password);

        //Email_duplication_validation
        $checking_email = "SELECT COUNT(*) AS total_users FROM users WHERE email='$validated_email'";
        $db_result = mysqli_query($db_connection, $checking_email);
        $after_assoc = mysqli_fetch_assoc($db_result);

        if ($after_assoc['total_users'] == 0) {
            // Insertion Query
            $insert_query = "INSERT INTO users(user_name, email, phone, password) VALUES('$user_name', 
            '$user_email', '$phone', '$encrypt_password')";

            // Insert data into database
            mysqli_query($db_connection, $insert_query);
            $_SESSION['success_msg'] = 'Congratulations! Registration successful.';
            header('location: register.php');
        } else {
            $_SESSION['err_msg'] = 'User already registered with this email.';
            header('location: register.php');
        }
    } else {
        $_SESSION['err_msg'] = 'Password must be of at least 8 characters and contain capital letter, small letter, number and special character.';
        header('location: register.php');
    }
} else {
    $_SESSION['err_msg'] = 'Invalid Email. Please use a valid email.';
    header('location: register.php');
}
