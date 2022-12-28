<?php
$title = "Edit profile";                    /* This title is related to "header.php" file. */
$h1 = "Edit Profile";                       /* This h1 tag is related to "header.php" file. */
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
    header('location: ../login.php');       /* Go to login page if not logged in */
}
?>
<!-- This section is for building the structure for profile page -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="title text-capitalize text-center">Profile Edit Form</h5>
                    </div>
                    <div class="card-body bg-primary text-light">
                        <!-- This section is for showing the error messages -->
                        <?php
                        if (isset($_SESSION['profile_error'])) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION['profile_error'];
                                unset($_SESSION['profile_error']);
                                ?>
                            </div>
                        <?php } ?>

                        <!-- Form Section -->

                        <form action="profile_edit_post.php" method="POST">
                            <div class="mb-3">
                                <label for="" class="text-white text-capitalize">User name</label>
                                <input type="text" name="user_name" class="form-control" value="<?= $after_assoc['user_name'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="text-white text-capitalize"></label>
                                <input type="hidden" name="email" class="form-control" value="<?= $after_assoc['email'] ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="text-white text-capitalize">Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $after_assoc['phone'] ?>">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-warning">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>

<?
require_once('footer.php');
?>