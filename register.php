<?php
session_start();
$title = "Registration";    /* This title is related to "header.php" file. */
$h1 = "Registration Form";  /* This h1 tag is related to "header.php" file. */
require_once('header.php');

if (isset($_SESSION['user_status'])) {
  header('location: /admin/dashboard.php');
}

?>

<div class="container">
  <div class="row">
    <div class="col-lg-7 m-auto">
      <div class="card mt-3">
        <div class="card-header bg-success text-white">
          Registration Form
        </div>
        <div class="card-body">
          <?php
          if (isset($_SESSION['err_msg'])) {
          ?>
            <div class="alert alert-danger" role="alert">
              <?php
              echo $_SESSION['err_msg'];
              unset($_SESSION['err_msg']);
              ?>
            </div>
          <?php
          }
          ?>

          <?php
          if (isset($_SESSION['success_msg'])) {
          ?>
            <div class="alert alert-success" role="alert">
              <?php
              echo $_SESSION['success_msg'];
              unset($_SESSION['success_msg']);
              ?>
            </div>
          <?php
          }
          ?>

          <form action='register_post.php' method='post'>
            <div class="form-row mb-3">
              <label class='form-label text-capitalize'>your name</label>
              <input type="text" class='form-control' placeholder="Enter your name" name='user_name'>
            </div>
            <div class="form-row mb-3">
              <label class='form-label text-capitalize'>your email</label>
              <input type="email" class='form-control' placeholder="Enter your email" name='user_email'>
            </div>
            <div class="form-row mb-3">
              <label class='form-label text-capitalize'>your phone</label>
              <input type="text" class='form-control' placeholder="Enter your phone number" name='phone'>
            </div>
            <div class="form-row mb-3">
              <label class='form-label text-capitalize'>your password</label>
              <input type="password" class='form-control' placeholder="Enter your password" name='password'>
            </div>
            <div class="form-row mb-3">
              <button type='submit' class='form-control btn-success'>Register</button>
            </div>
            <div class="form-row mb-3">
              <button type="$_REQUEST"><a href="login.php">Log In</a></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once('footer.php');
?>