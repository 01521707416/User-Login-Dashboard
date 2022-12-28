<?php
$title = "Change Password";                         /* This title is related to "header.php" file. */
$h1 = "Change Password";                            /* This h1 tag is related to "header.php" file. */
session_start();
require_once('../header.php');                      /* Importing header page */
require_once('navbar.php');                         /* Importing navbar page */
require_once('../database.php');                    /* Importing database page */

if (!isset($_SESSION['user_status'])) {             /* Condition to make sure user logged in first */
    header('location: ../login.php');               /* Get back into login page if not logged in */
}
?>
<!-- This section is for building the structure for change password page -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        <h5 class="title text-capitalize text-center">Change Password Form</h5>
                    </div>
                    <div class="card-body bg-warning text-dark">
                        <!-- This section is for showing the error messages -->
                        <?php
                        if (isset($_SESSION['pass_change_err'])) {
                        ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION['pass_change_err'];
                                unset($_SESSION['pass_change_err']);
                                ?>
                            </div>
                        <?php } ?>
                        <!-- This section is for showing the success message -->
                        <?php
                        if (isset($_SESSION['pass_change_success'])) {
                        ?>
                            <div class="alert alert-success" role="alert">
                                <?php
                                echo $_SESSION['pass_change_success'];
                                unset($_SESSION['pass_change_success']);
                                ?>
                            </div>
                        <?php } ?>

                        <!-- Form Section -->

                        <form action="change_password_post.php" method="POST">
                            <div class="mb-3">
                                <label class="text-dark text-capitalize mb-2">Current password</label>
                                <input type="password" name="old_pass" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="text-dark text-capitalize mb-2">New password</label>
                                <input type="password" name="new_pass" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="text-dark text-capitalize mb-2">Confirm new password</label>
                                <input type="password" name="confirm_pass" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
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