<?php
$title = "Profile";                         /* This title is related to "header.php" file. */
$h1 = "Profile";                       /* This h1 tag is related to "header.php" file. */
session_start();
require_once('../header.php');              /* Importing header page */
require_once('navbar.php');                 /* Importing navbar page */
require_once('../database.php');            /* Importing database page */
$login_email = $_SESSION['email'];          /* Importing SESSION email from login_post page */

/* Query for importing required data from the database */
$get_query = "SELECT user_name, email, phone FROM users WHERE email='$login_email'";
$db_result = mysqli_query($db_connection, $get_query);  /* Connect above query with database */
$after_assoc = mysqli_fetch_assoc($db_result);          /* Conversion of $db_result into associative array */

if (!isset($_SESSION['user_status'])) {     /* Condition to make sure user logged in first */
    header('location: ../login.php');
}
?>
<!-- This section is for building the structure for profile page -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-dark text-info">
                        <h5 class="title text-capitalize text-center">Profile Information
                            <a href="profile_edit.php" class="btn btn-sm btn-danger text-white d-flex justify-content-center mt-2">
                                Edit Profile
                            </a>
                        </h5>
                    </div>
                    <div class="card-body bg-dark text-light">
                        <p><span class="text-light">Name: </span><?= $after_assoc['user_name'] ?></p>
                        <p><span class="text-light">Email: </span><?= $after_assoc['email'] ?></p>
                        <p><span class="text-light">Phone: </span><?= $after_assoc['phone'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>





</section>

<?
require_once('footer.php');
?>