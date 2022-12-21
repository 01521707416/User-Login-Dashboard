<?php
$h1 = "Dashboard";                  /* This h1 tag is related to "header.php" file. */
$title = "Dashboard";               /* This title is related to "header.php" file. */
session_start();                    /* Starting session in order to handle SESSION data */
require_once('../header.php');      /* Relating page */
require_once('navbar.php');         /* Relating page */
require_once('../database.php');    /* Relating page */

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');               /* Condition for going to login page */
}

$get_query = "SELECT user_name, email, phone FROM users";   /* Query for reading table data from database */
$from_db = mysqli_query($db_connection, $get_query);        /* Biilding connection */

?>
<!-- Table structure from bootstrap 5.1 -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-mg-10 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-capitalize text-info">All Users List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-striped">
                            <thead>
                                <!-- Table column headers name set by me -->
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($from_db as $users_list) {  /* condition to read table data */
                                ?>
                                    <!-- Printing out data -->
                                    <tr>
                                        <td><?= $users_list['user_name'] ?></td>
                                        <td><?= $users_list['email'] ?></td>
                                        <td><?= $users_list['phone'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once('../footer.php');
?>