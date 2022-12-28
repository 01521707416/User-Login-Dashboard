<?php
session_start();
require_once('../database.php');                /* Importing database page */

// print_r($_POST);
$login_email = $_SESSION['email'];              /* Catching the email using SESSION */

if ($_POST['old_pass'] == NULL || $_POST['new_pass'] == NULL || $_POST['confirm_pass'] == NULL) {

    /* Condition for handling empty fields */

    $_SESSION['pass_change_err'] = "Password fields cannot be empty";
    header('location: change_password.php');
} else {
    if (strlen($_POST['old_pass'] > 5 && strlen($_POST['new_pass']) > 5 && strlen($_POST['confirm_pass']) > 5)) {

        /* Condition for handling password length */
        $password = $_POST['new_pass'];

        /* Password Rules */
        $pass_cap = preg_match('@[A-Z]@', $password);
        $pass_small = preg_match('@[a-z]@', $password);
        $pass_num = preg_match('@[0-9]@', $password);
        $pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
        $pass_char = preg_match($pattern, $password);

        if ($pass_cap == 1 && $pass_small == 1 && $pass_num == 1 && $pass_char == 1) {
            /* Condition for password validation */

            if ($_POST['new_pass'] == $_POST['confirm_pass']) {
                /* Matching confirm passwrod with new password */


                if ($_POST['old_pass'] == $_POST['new_pass'] && $_POST['confirm_pass']) {
                    /* Handling no changes in new and current password */

                    $_SESSION['pass_change_err'] = "New password cannot be the same as old password!";
                    header('location: change_password.php');
                } else {
                    /* Queries for fetching data from database */

                    $encrypted_old_pass = md5($_POST['old_pass']);
                    echo $checking_query = "SELECT COUNT(*) AS total_users FROM users WHERE email = '$login_email' AND 
                    password = '$encrypted_old_pass'";

                    $db_result = mysqli_query($db_connection, $checking_query);
                    $after_assoc = mysqli_fetch_assoc($db_result);

                    if ($after_assoc['total_users'] == 1) {

                        /* Queries for updating password */

                        $encrypted_new_pass = md5($_POST['new_pass']);
                        $update_query = "UPDATE users SET password='$encrypted_new_pass' WHERE email='$login_email'";
                        mysqli_query($db_connection, $update_query);
                        $_SESSION['pass_change_success'] = "Password changed successfully!";
                        header('location: change_password.php');
                    } else {

                        $_SESSION['pass_change_err'] = "Entered wrong password!";
                        header('location: change_password.php');
                    }
                }
            } else {

                $_SESSION['pass_change_err'] = "Confirm and new password didn't match";
                header('location: change_password.php');
            }
        } else {

            $_SESSION['pass_change_err'] = "Password must contain at least 1 capital letter, 1 small letter, 1 number and a special character.";
            header('location: change_password.php');
        }
    } else {

        $_SESSION['pass_change_err'] = "Passwords must have at least 6 characters";
        header('location: change_password.php');
    }
}
