<?php
$h1 = "Guest's Messages";                       /* This h1 tag is related to "header.php" file. */
$title = "Guest Messages";                          /* This title is related to "header.php" file. */
session_start();                                    /* Starting session in order to handle SESSION data */
require_once('../header.php');                      /* Relating page */
require_once('navbar.php');                         /* Relating page */
require_once('../database.php');                    /* Relating page */

if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');                       /* Condition for going to login page */
}
$get_query = "SELECT * FROM guest_messages";                /* Query for reading table data from database */
$from_db = mysqli_query($db_connection, $get_query);        /* Building connection */

?>
<!-- Table structure from bootstrap 5.1 -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-mg-10 m-auto">
                <div class="card mt-5">
                    <div class="card-header bg-dark">
                        <h5 class="card-title text-center text-info">All Guests Message List</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-success table-striped">
                            <thead>
                                <!-- Table column headers name set by me -->
                                <th>Guest Name</th>
                                <th>Guest Email</th>
                                <th>Messages</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($from_db as $guests_list) {  /* condition to read table data */
                                ?>
                                    <!-- Printing out data -->
                                    <tr class="<?php
                                                if ($guests_list['read_status'] == 1) {
                                                    echo "text-success";
                                                } else {
                                                    echo "text-dark";
                                                }
                                                ?>">
                                        <td><?= $guests_list['guest_name'] ?></td>
                                        <td><?= $guests_list['guest_email'] ?></td>
                                        <td><?= $guests_list['guest_message'] ?></td>
                                        <td>

                                            <?php
                                            if ($guests_list['read_status'] == 1) :
                                            ?>
                                                <a href="message_status.php?message_id=<?= $guests_list['id'] ?>" class="btn btn-sm btn-warning">Mark as read</a>
                                            <?php
                                            else :
                                            ?>
                                                <a href="" class="btn btn-sm btn-danger">Delete</a>
                                            <?php
                                            endif
                                            ?>

                                        </td>
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