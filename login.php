<?php
$title = "Login";              /* This title is related to "header.php" file. */
$h1 = "Login Form";            /* This h1 tag is related to "header.php" file. */
session_start();
require_once('header.php');    /* Header section added and it will get the bootstrap automatically.*/

if (isset($_SESSION['user_status'])) {
    header('location: /admin/dashboard.php');
}

?>
<!-- Section area is used for creating login form using bootstrap -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-warning">
                        <h5 class="card-title d-flex justify-content-between">Login Form <a href="register.php">Register Here!</a></h5>
                    </div>
                    <div class="card-body">
                        <!-- action for catch data from a page; method defines type of action -->
                        <form action='login_post.php' method='post'>
                            <?php
                            if (isset($_SESSION['login_error'])) {

                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php
                                    echo $_SESSION['login_error'];
                                    unset($_SESSION['login_error']);
                                    ?>
                                </div>
                            <?php
                            }

                            ?>
                            <div class="form-row mb-3">
                                <label class='form-label text-capitalize'>your email</label>
                                <input type="email" class='form-control' placeholder="Enter your email" name='user_email'>
                            </div>

                            <div class="form-row mb-3">
                                <label class='form-label text-capitalize'>your password</label>
                                <input type="password" class='form-control' placeholder="Enter your password" name='password'>
                            </div>

                            <div class="form-row mb-3">
                                <button type='submit' class='form-control btn-success'>Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once('footer.php');
?>